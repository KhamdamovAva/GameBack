<?php

namespace App\Services;

use App\Models\Statuses\Status;
use Illuminate\Support\Facades\App;
use App\Interfaces\Services\StatusServiceInterface;
use App\Interfaces\Repositories\StatusRepositoryInterface;

class StatusService extends BaseService implements StatusServiceInterface
{
#TODO add new method for get slug
    public function __construct(protected StatusRepositoryInterface $statusRepository)
    {
        //
    }
    public function getAllStatuses(){
        $statuses = $this->statusRepository->allStatuses();
        return $statuses;
    }
    public function createStatus($statusDTO){
        $translations = $this->prepareTranslations(['translations' => $statusDTO->translations], ['name']);
        $locale = App::getLocale();
        $name = $translations[$locale]['name'];
        $slug = $this->generateSlug($name, Status::class);
        $data = [
            'translations' => $translations,
            'slug' => $slug
        ];
        $status = $this->statusRepository->createStatus($data);
        return $status;
    }
    public function updateStatus($statusDTO, $id){
        $translations = $this->prepareTranslations(['translations' => $statusDTO->translations], ['name']);
        $locale = App::getLocale();
        $name = $translations[$locale]['name'];
        $newSlug = $this->generateSlug($name, Status::class);
        $data = [
            'translations' => $translations,
            'slug' => $newSlug
        ];
        $updatedStatus = $this->statusRepository->updateStatus($data, $id);
        return $updatedStatus;
    }
    public function getStatus($slug){
        return $this->statusRepository->getStatusBySlug($slug);
    }
    public function deleteStatus($id){
        $this->statusRepository->destroyStatus($id);
        return;
    }
}
