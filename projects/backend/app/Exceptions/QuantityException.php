<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;

class QuantityException extends Exception
{
    /**
     * @var
     */
    private $product;

    /**
     * @param $product
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($product, int $code = 0, ?Throwable $previous = null)
    {
        $this->product = $product;
        parent::__construct("", $code, $previous);
    }

    /**
     * @param Request $exception
     * @return \Illuminate\Http\JsonResponse
     */
    public function render(Request $exception)
    {
        return response()->json("Istenildigi kadar " . optional($this->product)->id . " id'li urunden stokta kalmadi. Tum islemler geri alindi.");
    }
}
