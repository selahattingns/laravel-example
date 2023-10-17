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

    /**
     * @param $customerId
     * @param $total
     * @return mixed
     */
    public function create($customerId, $total){
        return $this->model->query()->create([
            "customer_id" => $customerId,
            "total" => $total,
        ]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findWithItems($id){
        return $this->model->query()->with('items')->find($id);
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function find($id)
    {
        return $this->model->query()->find($id);
    }

    /**
     * @param $id
     * @param $total
     * @return int|mixed
     */
    public function updateWithId($id, $total)
    {
        return $this->model->query()->where('id', $id)->update(['total' => $total]);
    }
}
