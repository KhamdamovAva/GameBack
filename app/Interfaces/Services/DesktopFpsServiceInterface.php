<?php

namespace App\Interfaces\Services;

interface DesktopFpsServiceInterface
{
    public function allDesktopFps();
    public function storeFps($fpsDTO);
    public function updateFps($fpsDTO, $id);
    public function getFps($id);
    public function deleteFps($id);
}
