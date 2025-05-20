<?php

namespace App\Services;

use App\Interfaces\Repositories\OrderRepositoryInterface;
use App\Interfaces\Services\OrderServiceInterface;

class OrderService extends BaseService implements OrderServiceInterface
{

    public function __construct(protected OrderRepositoryInterface $orderRepository)
    {
        //
    }
    public function createOrder($orderDTO){
        $formattedItems = [];

        foreach ($orderDTO->items as $item) {
            $formattedItems = [];

            foreach ($orderDTO->items as $item) {
                if (isset($item['item_id'], $item['name'], $item['quantity'], $item['price'])) {
                    $item['type'] = $this->detectItemType($item['item_id']);
                    $formattedItems[] = $item;
                }
            }

            if (empty($formattedItems)) {
                throw new \Exception("No valid items found.");
            }
        }
        $data = [
            'fullname' => $orderDTO->fullname,
            'phone' => $orderDTO->phone,
            'address' => $orderDTO->address,
            'delivery_method_id' => $orderDTO->delivery_method_id,
            'comment' => $orderDTO->comment,
            'items' => $formattedItems,
        ];
        return $this->orderRepository->create($data);
    }
    public function allOrders(){
        return $this->orderRepository->index();
    }
    public function showOrder($id){
        return $this->orderRepository->show($id);
    }
    public function deleteOrder($id){
        return $this->orderRepository->destroy($id);
    }
    public function updateOrder($status, $id){
        return $this->orderRepository->update($status, $id);
    }
}
