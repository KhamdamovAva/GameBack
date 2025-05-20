<?php

namespace App\Services;

use App\Interfaces\Repositories\LangRepositoryInterface;
use App\Interfaces\Services\LangServiceInterface;

class LangService extends BaseService implements LangServiceInterface
{

    public function __construct(protected LangRepositoryInterface $langRepository)
    {
        //
    }

    public function allLangs(){
        $langs = $this->langRepository->getAllLangs();
        return $langs;
    }
    public function createLanguage($langDTO){
        $data = [
            'locale' => $langDTO->locale
        ];
        $lang = $this->langRepository->createLang($data);
        return $lang;
    }
    public function updateLanguage($langDTO, $id){
        $data = [
            'locale' => $langDTO->locale
        ];
        $lang = $this->langRepository->updateLang($data, $id);
        return $lang;
    }
    public function getLanguage($id){
        $lang = $this->langRepository->showLang($id);
        return $lang;
    }
    public function deleteLanguage($id){
        $this->langRepository->deleteLang($id);
        return;
    }
}
