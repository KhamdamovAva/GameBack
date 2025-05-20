<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Orders\Order;
use App\Models\Orders\OrderItem;
use App\Interfaces\Repositories\OrderRepositoryInterface;
use App\Notifications\NewOrderNotification;

class OrderRepository implements OrderRepositoryInterface
{
    public function index(){
        return Order::with('items')->paginate(10);
    }
    public function create($data){
        $order = new Order();
        $order->delivery_method_id = $data['delivery_method_id'];
        $order->fullname = $data['fullname'];
        $order->phone = $data['phone'];
        $order->address = $data['address'];
        $order->comment = $data['comment'];
        $order->save();
        $order->refresh();
            foreach ($data['items'] as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'item_type' => $item['type'],
                    'item_id' => $item['item_id'],
                    'name' => $item['name'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price']
                ]);
            }
        $admin = User::whereHas('role', function ($query) {
            $query->where('name', 'admin');
        })->firstOrFail();
        $admin->notify(new NewOrderNotification($order));
        return $order;
    }
    public function update($status, $id){
        $order = $this->show($id);
        $order->status = $status;
        $order->save();
        $order->refresh();
        return $order;
    }
    public function show($id){
        return Order::with('items')->findOrFail($id);
    }
    public function destroy($id){
        $order = $this->show($id);
        $order->delete();
        return;
    }
}
