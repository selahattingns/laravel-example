<?php

namespace Database\Seeders;

use App\Services\OrderItemService;
use App\Services\OrderService;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**$order = app()->make(OrderService::class)->firstOrCreate(
            1,200
        );
        app()->make(OrderItemService::class)->firstOrCreate(
            $order->id, 2, 10, 20, 200
        );**/
    }
}
