<?php

namespace App\Interfaces\Services;

interface StatusServiceInterface
{
    public function getAllStatuses();
    public function createStatus($statusDTO);
    public function updateStatus($statusDTO, $id);
    public function getStatus($id);
    public function deleteStatus($id);

}
