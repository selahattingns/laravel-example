<?php
namespace App\Repositories;

use App\Interfaces\OrderItemInterface;
use App\Models\OrderItem;

class OrderItemRepository implements OrderItemInterface {

    /**
     * @var OrderItem
     */
    public $model;

    /**
     * @param OrderItem $model
     */
    public function __construct(OrderItem $model)
    {
        $this->model = $model;
    }

    /**
     * @param $orderId
     * @param $productId
     * @param $quantity
     * @param $unitPrice
     * @param $total
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|mixed
     */
    public function firstOrCreate($orderId, $productId, $quantity, $unitPrice, $total){
        return $this->model->query()->firstOrCreate([
            "order_id" => $orderId,
            "product_id" => $productId,
            "quantity" => $quantity,
            "unit_price" => $unitPrice,
            "total" => $total,
        ]);
    }
}
