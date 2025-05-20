<?php

namespace App\Services;

use App\Models\Services\Service as ServiceModel;
use Illuminate\Support\Facades\App;
use App\Interfaces\Services\ServiceInterface;
use App\Interfaces\Repositories\ServiceRepositoryInterface;

class Service extends BaseService implements ServiceInterface
{

    public function __construct(protected ServiceRepositoryInterface $serviceRepository)
    {
        //
    }
    public function allServices(){
        return $this->serviceRepository->index();
    }
    public function getService($slug){
        return $this->serviceRepository->show($slug);
    }
    public function storeService($serviceDTO){
        $translations = $this->prepareTranslations(['translations' => $serviceDTO->translations], ['name', 'type', 'description', 'status', 'services']);
        $locale = App::getLocale();
        $slug = $this->generateSlug($translations[$locale]['name'], ServiceModel::class);
        $data = [
            'translations' => $translations,
            'slug' => $slug,
            'image' => $serviceDTO->image
        ];
        return $this->serviceRepository->store($data);
    }
    public function updateService($serviceDTO, $id){
        $translations = $this->prepareTranslations(['translations' => $serviceDTO->translations], ['name', 'type', 'description', 'status', 'services']);
        $locale = App::getLocale();
        $slug = $this->generateSlug($translations[$locale]['name'], ServiceModel::class);
        $data = [
            'translations' => $translations,
            'slug' => $slug,
            'image' => $serviceDTO->image
        ];
        return $this->serviceRepository->update($data, $id);
    }
    public function deleteService($id){
        return $this->serviceRepository->delete($id);
    }
}
