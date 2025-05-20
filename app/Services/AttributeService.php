<?php

namespace App\Services;

use App\Services\BaseService;
use App\Interfaces\Services\AttributeServiceInterface;
use App\Interfaces\Repositories\AttributeRepositoryInterface;

class AttributeService extends BaseService implements AttributeServiceInterface
{

    public function __construct(protected AttributeRepositoryInterface $attributeRepository)
    {
        //
    }
    public function getAllAttributes(){
        $attributes = $this->attributeRepository->allAttributes();
        return $attributes;
    }
    public function createAttribute($attributeDTO){
        $translations = $this->prepareTranslations(['translations' => $attributeDTO->translations], ['name']);
        $data = [
            'user_id' => $attributeDTO->user_id,
            'translations' => $translations,
            'value' => $attributeDTO->value
        ];
        $attribute = $this->attributeRepository->storeAttribute($data);
        return $attribute;
    }
    public function getAttribute($id){
        $attribute = $this->attributeRepository->getAttributeById($id);
        return $attribute;
    }
    public function updateAttribute($attributeDTO, $id){
        $translations = $this->prepareTranslations(['translations' => $attributeDTO->translations], ['name']);
        $data = [
            'user_id' => $attributeDTO->user_id,
            'translations' => $translations,
            'value' => $attributeDTO->value
        ];
        $attribute = $this->attributeRepository->updateAttribute($data, $id);
        return $attribute;
    }
    public function deleteAttribute($id){
        $this->attributeRepository->destroyAttribute($id);
        return;
    }
}
