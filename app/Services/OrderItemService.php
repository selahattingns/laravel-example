<?php
namespace App\Services;

use App\Interfaces\OrderItemInterface;

class OrderItemService {
    /**
     * @var OrderItemInterface
     */
    public $orderItemRepository;

    /**
     * @param OrderItemInterface $orderItemRepository
     */
    public function __construct(OrderItemInterface $orderItemRepository)
    {
        $this->orderItemRepository = $orderItemRepository;
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
        return $this->orderItemRepository->firstOrCreate($orderId, $productId, $quantity, $unitPrice, $total);
    }
}
