<?php
namespace App\Services;

use App\Exceptions\QuantityException;
use App\Interfaces\OrderInterface;
use Illuminate\Support\Facades\DB;

class OrderService {
    /**
     * @var OrderInterface
     */
    public $orderRepository;

    /**
     * @param OrderInterface $orderRepository
     */
    public function __construct(OrderInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * @param $customerId
     * @param $total
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|mixed
     */
    public function firstOrCreate($customerId, $total){
        return $this->orderRepository->firstOrCreate($customerId, $total);
    }

    /**
     * @param $customerId
     * @param $total
     * @return mixed
     */
    public function create($customerId, $total)
    {
        return $this->orderRepository->create($customerId, $total);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findWithItems($id)
    {
        return $this->orderRepository->findWithItems($id);
    }

    /**
     * @param $id
     * @param $total
     * @return mixed
     */
    public function updateWithId($id, $total)
    {
        return $this->orderRepository->updateWithId($id, $total);
    }

    /**
     * @param $customerId
     * @param $items
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     * @throws QuantityException
     */
    public function newOrder($customerId, $items)
    {
        DB::beginTransaction();
        $total = 0;
        $order = $this->create($customerId, 0);

        foreach ($items as $item) {
            $product = app()->make(ProductService::class)->find($item["product_id"]);
            if ($product->stock < $item["quantity"]){
                DB::rollBack();
                throw new QuantityException($product);
            }
            if ($product){
                $total += $product->price * $item["quantity"];
                $product->stock -= $item["quantity"];
                $product->save();
                app()->make(OrderItemService::class)->firstOrCreate( $order->id, $product->id, $item["quantity"], $product->price, $product->price * $item["quantity"] );
            }
        }

        $order->total = $total;
        $order->save();

        DB::commit();
        return $this->findWithItems($order->id);
    }
}
