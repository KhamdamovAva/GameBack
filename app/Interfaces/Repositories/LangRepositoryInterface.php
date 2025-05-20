<?php

namespace App\Interfaces\Repositories;

interface LangRepositoryInterface
{
    public function getAllLangs();
    public function createLang($data);
    public function updateLang($data, $id);
    public function showLang($id);
    public function deleteLang($id);
}
