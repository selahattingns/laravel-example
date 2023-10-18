<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderCalculateDiscountRequest;
use App\Http\Requests\OrderStoreRequest;
use App\Properties\Discount\DiscountProperty;
use App\Services\OrderItemService;
use App\Services\OrderService;
use App\Services\ProductService;
use Illuminate\Http\Request;

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

    /**
     * @param OrderCalculateDiscountRequest $request
     * @return array
     */
    public function calculateDiscount(OrderCalculateDiscountRequest $request)
    {
        $order = $this->orderService->find($request->order_id);
        return $order ? (new DiscountProperty())->getDiscounts($order) : [];
    }
}
