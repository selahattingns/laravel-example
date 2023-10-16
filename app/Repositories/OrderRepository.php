<?php
namespace App\Repositories;

use App\Interfaces\OrderInterface;
use App\Models\Order;

class OrderRepository implements OrderInterface {

    /**
     * @var Order
     */
    public $model;

    /**
     * @param Order $model
     */
    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    /**
     * @param $customerId
     * @param $total
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|mixed
     */
    public function firstOrCreate($customerId, $total){
        return $this->model->query()->firstOrCreate([
            "customer_id" => $customerId,
            "total" => $total,
        ]);
    }
}
