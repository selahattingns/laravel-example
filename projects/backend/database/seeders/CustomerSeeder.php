<?php

namespace Database\Seeders;

use App\Services\CustomerService;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()->make(CustomerService::class)->firstOrCreate(
            "Türker Jöntürk",
            Carbon::parse("2014-06-28"),
            492.12
        );
        app()->make(CustomerService::class)->firstOrCreate(
            "Kaptan Devopuz",
            Carbon::parse("2015-01-15"),
            1505.95
        );
        app()->make(CustomerService::class)->firstOrCreate(
            "İsa Sonuyumaz",
            Carbon::parse("2016-02-11"),
            0.00
        );
    }
}
