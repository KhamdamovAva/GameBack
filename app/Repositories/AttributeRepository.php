<?php

namespace App\Repositories;

use App\Models\Attributes\Attribute;
use App\Interfaces\Repositories\AttributeRepositoryInterface;

class AttributeRepository extends BaseRepository implements AttributeRepositoryInterface
{
    public function allAttributes(){
        $attributes = Attribute::all();
        return $attributes->load('translations');
    }
    public function storeAttribute($data){
        $attribute = new Attribute();
        $attribute->user_id = $data['user_id'];
        $attribute->value = $data['value'];
        $attribute->fill($data['translations']);
        $attribute->save();

        return $attribute->load('translations');
    }
    public function getAttributeById($id){
        $attribute = Attribute::findOrFail($id);
        return $attribute->load('translations');
    }
    public function updateAttribute($data, $id){
        $attribute = $this->getAttributeById($id);
        $attribute->value = $data['value'];
        $attribute->fill($data['translations'] ?? []);
        $attribute->save();

        return $attribute->load('translations');
    }
    public function destroyAttribute($id){
        $attribute = $this->getAttributeById($id);
        $attribute->delete();
        return;
    }
}
