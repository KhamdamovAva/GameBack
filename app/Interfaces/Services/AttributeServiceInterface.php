<?php

namespace App\Interfaces\Services;

interface AttributeServiceInterface
{
    public function getAllAttributes();
    public function createAttribute($attributeDTO);
    public function getAttribute($id);
    public function updateAttribute($attributeDTO, $id);
    public function deleteAttribute($id);
}
