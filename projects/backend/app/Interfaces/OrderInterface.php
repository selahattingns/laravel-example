<?php
namespace App\Interfaces;

interface OrderInterface {

    /**
     * @param $customerId
     * @param $total
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|mixed
     */
    public function firstOrCreate($customerId, $total);

    /**
     * @param $customerId
     * @param $total
     * @return mixed
     */
    public function create($customerId, $total);

    /**
     * @param $id
     * @return mixed
     */
    public function findWithItems($id);

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function find($id);

    /**
     * @param $id
     * @param $total
     * @return int|mixed
     */
    public function updateWithId($id, $total);
}
