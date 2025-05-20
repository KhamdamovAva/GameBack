<?php

namespace App\Interfaces\Services;

interface LangServiceInterface
{
    public function allLangs();
    public function createLanguage($langDTO);
    public function updateLanguage($langDTO, $id);
    public function getLanguage($id);
    public function deleteLanguage($id);

}
