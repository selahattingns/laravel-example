<?php
namespace App\Repositories;

use App\Interfaces\ProductInterface;
use App\Models\Product;

class ProductRepository implements ProductInterface {

    /**
     * @var Product
     */
    public $model;

    /**
     * @param Product $model
     */
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    /**
     * @param $name
     * @param $category
     * @param $price
     * @param $stock
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|mixed
     */
    public function firstOrCreate($name, $category, $price, $stock)
    {
        return $this->model->query()->firstOrCreate([
            "name" => $name,
            "category" => $category,
            "price" => $price,
            "stock" => $stock,
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function find($id) {
        return $this->model->query()->find($id);
    }
}
