<?php

namespace App\Services;

use App\Models\DeliveryMethods\DeliveryMethod;
use Illuminate\Support\Facades\App;
use App\Interfaces\Services\DeliveryMethodServiceInterface;
use App\Interfaces\Repositories\DeliveryMethodRepositoryInterface;

class DeliveryMethodService extends BaseService implements DeliveryMethodServiceInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected DeliveryMethodRepositoryInterface $deliveryMethodRepository)
    {
        //
    }
    public function allDeliveryMethods(){
        return $this->deliveryMethodRepository->index();
    }
    public function getDeliveryMethod($slug){
        return $this->deliveryMethodRepository->show($slug);
    }
    public function storeDeliveryMethod($deliveryMethodDTO){
        $translations = $this->prepareTranslations(['tranlsations' => $deliveryMethodDTO->translations], ['name', 'type', 'status', 'description', 'services']);
        $locale = App::getLocale();
        $slug = $this->generateSlug($translations[$locale]['name'], DeliveryMethod::class);
        $data = [
            'translations' => $translations,
            'slug' => $slug,
            'price' => $deliveryMethodDTO->price,
            'logo' => $deliveryMethodDTO->logo,
            'time' => $deliveryMethodDTO->estimated_delivery_time
        ];
        return $this->deliveryMethodRepository->store($data);
    }
    public function updateDeliveryMethod($deliveryMethodDTO, $id){
        $translations = $this->prepareTranslations(['tranlsations' => $deliveryMethodDTO->translations], ['name', 'type', 'status', 'description', 'services']);
        $locale = App::getLocale();
        $slug = $this->generateSlug($translations[$locale]['name'], DeliveryMethod::class);
        $data = [
            'translations' => $translations,
            'slug' => $slug,
            'price' => $deliveryMethodDTO->price,
            'logo' => $deliveryMethodDTO->logo,
            'time' => $deliveryMethodDTO->estimated_delivery_time
        ];
        return $this->deliveryMethodRepository->update($data, $id);
    }
    public function deleteDeliveryMethod($id){
        return $this->deliveryMethodRepository->destroy($id);
    }
}
