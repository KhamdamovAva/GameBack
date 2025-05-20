<?php

namespace App\Interfaces\Repositories;

interface AttributeRepositoryInterface
{
    public function allAttributes();
    public function storeAttribute($data);
    public function getAttributeById($id);
    public function updateAttribute($data, $id);
    public function destroyAttribute($id);
}
