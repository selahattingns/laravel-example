<?php

namespace Database\Seeders;

use App\Properties\Discount\DiscountProperty;
use Illuminate\Database\Seeder;

class RuleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        (new DiscountProperty())->ruleTypeSeeder();
    }
}
