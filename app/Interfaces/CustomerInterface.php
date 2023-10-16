<?php
namespace App\Interfaces;

interface CustomerInterface {

    /**
     * @param $name
     * @param $since
     * @param $revenue
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|mixed
     */
    public function firstOrCreate($name, $since, $revenue);
}
