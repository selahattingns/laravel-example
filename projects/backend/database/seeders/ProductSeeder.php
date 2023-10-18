<?php

namespace Database\Seeders;

use App\Enumerations\ProductEnumeration;
use App\Services\ProductService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()->make(ProductService::class)->firstOrCreate(
            "Decker A7062 40 Parça Cırcırlı Tornavida Seti",
            ProductEnumeration::CATEGORY_ONE,
            120.75,
            10
        );
        app()->make(ProductService::class)->firstOrCreate(
            "Reko Mini Tamir Hassas Tornavida Seti 32'li",
            ProductEnumeration::CATEGORY_ONE,
            49.50,
            10
        );
        app()->make(ProductService::class)->firstOrCreate(
            "Viko Karre Anahtar - Beyaz",
            ProductEnumeration::CATEGORY_TWO,
            11.28,
            10
        );
        app()->make(ProductService::class)->firstOrCreate(
            "Legrand Salbei Anahtar, Alüminyum",
            ProductEnumeration::CATEGORY_TWO,
            22.80,
            10
        );
        app()->make(ProductService::class)->firstOrCreate(
            "Schneider Asfora Beyaz Komütatör",
            ProductEnumeration::CATEGORY_TWO,
            12.95,
            10
        );
    }
}
