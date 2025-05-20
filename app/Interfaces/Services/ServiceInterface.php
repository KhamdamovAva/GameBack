<?php

namespace App\Interfaces\Services;

interface ServiceInterface
{
    public function allServices();
    public function getService($slug);
    public function storeService($serviceDTO);
    public function updateService($serviceDTO, $id);
    public function deleteService($id);
}
