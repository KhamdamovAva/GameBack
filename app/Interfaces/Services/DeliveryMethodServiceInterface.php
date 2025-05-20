<?php

namespace App\Interfaces\Services;

interface DeliveryMethodServiceInterface
{
    public function allDeliveryMethods();
    public function getDeliveryMethod($slug);
    public function storeDeliveryMethod($deliveryMethodDTO);
    public function updateDeliveryMethod($deliveryMethodDTO, $id);
    public function deleteDeliveryMethod($id);
}
