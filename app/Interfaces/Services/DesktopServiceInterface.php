<?php

namespace App\Interfaces\Services;

interface DesktopServiceInterface
{
    public function allDesktops();
    public function createDesktop($desktopDTO);
    public function updateDesktop($desktopDTO, $id);
    public function showDesktop($slug);
    public function deleteDesktop($id);
}
