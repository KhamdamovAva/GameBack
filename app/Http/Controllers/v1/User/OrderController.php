<?php

namespace App\Http\Controllers\v1\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\OrderResource;
use App\Http\Requests\v1\Order\StoreOrderRequest;
use App\Interfaces\Services\OrderServiceInterface;
use App\DTO\OrderDTO;

class OrderController extends Controller
{
    public function __construct(protected OrderServiceInterface $orderService){

    }
    public function index()
    {
        //
    }
    public function store(StoreOrderRequest $request)
    {
        $orderDTO = new OrderDTO($request->fullname, $request->phone, $request->delivery_method_id, $request->address, $request->comment, $request->items);
        $order = $this->orderService->createOrder($orderDTO);
        return $this->success(new OrderResource($order), __('successes.order.created'), 201);
    }
    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
