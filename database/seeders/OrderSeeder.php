<?php

namespace Database\Seeders;

use App\Services\OrderItemService;
use App\Services\OrderService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**$order = app()->make(OrderService::class)->firstOrCreate(
            1,100
        );
        app()->make(OrderItemService::class)->firstOrCreate(
            $order->id, 1, 10, 10, 100
        );**/
    }
}
