<?php

namespace App\Services;

use App\Interfaces\Repositories\ContactRepositoryInterface;
use App\Interfaces\Services\ContactServiceInterface;

class ContactService extends BaseService implements ContactServiceInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected ContactRepositoryInterface $contactRepository)
    {
        //
    }
    public function allContact(){
        return $this->contactRepository->index();
    }
    public function createContact($contactDTO){
        $data = [
            'fullname' => $contactDTO->fullname,
            'phone' => $contactDTO->phone
        ];
        return $this->contactRepository->store($data);
    }
    public function updateStatusContact($status, $id){
        return $this->contactRepository->update($status, $id);
    }
    public function getContact($id){
        return $this->contactRepository->show($id);
    }
    public function deleteContact($id){
        return $this->contactRepository->destroy($id);
    }
}
