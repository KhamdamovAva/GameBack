<?php

namespace App\Interfaces\Services;

interface OrderServiceInterface
{
    public function createOrder($orderDTO);
    public function allOrders();
    public function showOrder($id);
    public function deleteOrder($id);
    public function updateOrder($status, $id);
}
