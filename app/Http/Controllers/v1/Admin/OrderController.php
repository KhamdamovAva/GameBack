<?php

namespace App\Http\Controllers\v1\Admin;

use App\DTO\OrderDTO;
use App\Http\Requests\v1\Order\UpdateOrderRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\OrderResource;
use App\Interfaces\Services\OrderServiceInterface;

class OrderController extends Controller
{
    public function __construct(protected OrderServiceInterface $orderService){

    }
    public function index()
    {
        $orders = $this->orderService->allOrders();
        return $this->responsePagination($orders, OrderResource::collection($orders), __('successes.order.all'));
    }
    public function show(string $id)
    {
        $order = $this->orderService->showOrder($id);
        return $this->success(new OrderResource($order), __('successes.order.show'));
    }

    public function update(UpdateOrderRequest $request, string $id)
    {
        $order = $this->orderService->updateOrder($request->status, $id);
        return $this->success(new OrderResource($order), __('successes.order.updated'));
    }

    public function destroy(string $id)
    {
        $this->orderService->deleteOrder($id);
        return $this->success([], __('successes.order.deleted'));
    }
}
