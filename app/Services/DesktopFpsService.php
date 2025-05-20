<?php
namespace App\Services;

use App\Interfaces\Repositories\DesktopFpsRepositoryInterface;
use App\Interfaces\Services\DesktopFpsServiceInterface;

class DesktopFpsService extends BaseService implements DesktopFpsServiceInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected DesktopFpsRepositoryInterface $desktopFpsRepository)
    {
        //
    }
    public function allDesktopFps()
    {
        return $this->desktopFpsRepository->index();
    }
    public function storeFps($fpsDTO)
    {
        $data = [
            'game_id' => (int)$fpsDTO->fps['game_id'],
            'resolution' => $fpsDTO->fps['resolution'],
            'fps_value'  => $fpsDTO->fps['fps_value'],
        ];
        return $this->desktopFpsRepository->store($data);
    }

    public function updateFps($fpsDTO, $id)
    {
        $data = [
            'game_id' => (int)$fpsDTO->fps['game_id'],
            'resolution' => $fpsDTO->fps['resolution'],
            'fps_value'  => $fpsDTO->fps['fps_value'],
        ];
        return $this->desktopFpsRepository->update($data, $id);
    }
    public function getFps($id)
    {
        return $this->desktopFpsRepository->show($id);
    }
    public function deleteFps($id)
    {
        return $this->desktopFpsRepository->delete($id);
    }
}
