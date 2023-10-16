<?php
namespace App\Services;

use App\Interfaces\OrderInterface;

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
}
