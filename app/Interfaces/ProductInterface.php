<?php
namespace App\Interfaces;

interface ProductInterface {

    /**
     * @param $name
     * @param $category
     * @param $price
     * @param $stock
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|mixed
     */
    public function firstOrCreate($name, $category, $price, $stock);
}
