<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Services\OrderItemService;
use App\Services\OrderService;
use App\Services\ProductService;

class OrderController extends Controller
{
    /**
     * @var OrderService
     */
    private $orderService;

    /**
     * @param OrderService $orderService
     */
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * @param OrderStoreRequest $request
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function store(OrderStoreRequest $request)
    {
        return $this->orderService->newOrder($request->customer_id, $request->items);
    }
}
