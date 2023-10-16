<?php
namespace App\Interfaces;

interface OrderItemInterface {

    /**
     * @param $orderId
     * @param $productId
     * @param $quantity
     * @param $unitPrice
     * @param $total
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|mixed
     */
    public function firstOrCreate($orderId, $productId, $quantity, $unitPrice, $total);
}
