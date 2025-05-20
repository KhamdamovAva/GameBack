<?php

namespace App\Repositories;

use App\Models\Lang;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\Repositories\LangRepositoryInterface;

class LangRepository implements LangRepositoryInterface
{

    public function getAllLangs(){
        $langs = Lang::all();
        return $langs;
    }
    public function createLang($data){
        $lang = new Lang();
        $lang->user_id = Auth::id();
        $lang->locale = $data['locale'];
        $lang->save();
        return $lang;
    }

    public function updateLang($data, $id){
        $lang = $this->showLang($id);
        $lang->locale = $data['locale'];
        $lang->save();
        return $lang;
    }
    public function showLang($id){
        $lang = Lang::findOrFail($id);
        return $lang;
    }
    public function deleteLang($id){
        $lang = $this->showLang($id);
        $lang->delete();
        return;
    }
}
