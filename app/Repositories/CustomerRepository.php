<?php
namespace App\Repositories;

use App\Interfaces\CustomerInterface;
use App\Models\Customer;

class CustomerRepository implements CustomerInterface {

    /**
     * @var Customer
     */
    public $model;

    /**
     * @param Customer $model
     */
    public function __construct(Customer $model)
    {
        $this->model = $model;
    }

    /**
     * @param $name
     * @param $since
     * @param $revenue
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|mixed
     */
    public function firstOrCreate($name, $since, $revenue){
        return $this->model->query()->firstOrCreate([
            "name" => $name,
            "since" => $since,
            "revenue" => $revenue,
        ]);
    }
}
