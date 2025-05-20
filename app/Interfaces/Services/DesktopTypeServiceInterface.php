<?php

namespace App\Interfaces\Services;

interface DesktopTypeServiceInterface
{
    public function allDesktopTypes();
    public function getDesktopType($slug);
    public function storeDesktopType($desktopTypeDTO);
    public function updateDesktopType($desktopTypeDTO, $id);
    public function deleteDesktopType($id);
}
