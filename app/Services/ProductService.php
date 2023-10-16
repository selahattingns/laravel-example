<?php
namespace App\Services;

use App\Interfaces\ProductInterface;

class ProductService {
    /**
     * @var ProductInterface
     */
    public $productRepository;

    /**
     * @param ProductInterface $productRepository
     */
    public function __construct(ProductInterface $productRepository)
    {
        $this->productRepository = $productRepository;
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
        return $this->productRepository->firstOrCreate($name, $category, $price, $stock);
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function find($id)
    {
        return $this->productRepository->find($id);
    }
}
