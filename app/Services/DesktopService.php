<?php

namespace App\Services;

use App\Models\Desktops\Desktop;
use Illuminate\Support\Facades\App;
use App\Interfaces\Services\DesktopServiceInterface;
use App\Interfaces\Repositories\DesktopRepositoryInterface;

class DesktopService extends BaseService implements DesktopServiceInterface
{

    public function __construct(protected DesktopRepositoryInterface $desktopRepository)
    {
        //
    }
    public function allDesktops()
    {
        return $this->desktopRepository->index();
    }
    public function createDesktop($desktopDTO)
    {
        $translations = $this->prepareTranslations(['translations' => $desktopDTO->translations], ['name', 'description']);
        $locale = App::getLocale();
        $slug = $this->generateSlug($translations[$locale]['name'], Desktop::class);
        $data = [
            'type' => $desktopDTO->type,
            'price' => $desktopDTO->price,
            'statuses' => $desktopDTO->statuses,
            'attributes' => $desktopDTO->attributes,
            'image' => $desktopDTO->image,
            'slug' => $slug,
            'desktopFPS' => $desktopDTO->desktopFPS,
            'desktop_type_id' => $desktopDTO->desktop_type_id,
            'translations' => $translations,
            'discount' => $desktopDTO->discount
        ];
        return $this->desktopRepository->store($data);
    }
    public function showDesktop($slug)
    {
        return $this->desktopRepository->show($slug);
    }

    public function updateDesktop($desktopDTO, $id)
    {
        $translations = $this->prepareTranslations(['translations' => $desktopDTO->translations], ['name', 'description']);
        $locale = App::getLocale();
        $slug = $this->generateSlug($translations[$locale]['name'], Desktop::class);

        $data = [
            'type' => $desktopDTO->type,
            'price' => $desktopDTO->price,
            'statuses' => $desktopDTO->statuses,
            'attributes' => $desktopDTO->attributes,
            'image' => $desktopDTO->image,
            'slug' => $slug,
            'desktopFPS' => $desktopDTO->desktopFPS,
            'desktop_type_id' => $desktopDTO->desktop_type_id,
            'translations' => $translations,
            'discount' => $desktopDTO->discount
        ];

        return $this->desktopRepository->update($data, $id);
    }

    public function deleteDesktop($id)
    {
        // Delete the desktop
        return $this->desktopRepository->destroy($id);
    }
}
