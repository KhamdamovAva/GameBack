<?php

namespace App\Services;

use App\Interfaces\Repositories\DesktopTypeRepositoryInterface;
use App\Interfaces\Services\DesktopTypeServiceInterface;
use App\Models\DesktopType;

class DesktopTypeService extends BaseService implements DesktopTypeServiceInterface
{

    public function __construct(protected DesktopTypeRepositoryInterface $desktopTypeRepository)
    {
        //
    }
    public function allDesktopTypes(){
        return $this->desktopTypeRepository->index();
    }
    public function getDesktopType($slug){
        return $this->desktopTypeRepository->show($slug);
    }
    public function storeDesktopType($desktopTypeDTO){
        $slug = $this->generateSlug($desktopTypeDTO->name, DesktopType::class);
        $data = [
            'name' => $desktopTypeDTO->name,
            'slug' => $slug
        ];
        return $this->desktopTypeRepository->store($data);
    }
    public function updateDesktopType($desktopTypeDTO, $id){
        $slug = $this->generateSlug($desktopTypeDTO->name, DesktopType::class);
        $data = [
            'name' => $desktopTypeDTO->name,
            'slug' => $slug
        ];
        return $this->desktopTypeRepository->update($data, $id);
    }
    public function deleteDesktopType($id){
        return $this->desktopTypeRepository->destroy($id);
    }
}
