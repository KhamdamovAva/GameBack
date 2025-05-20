<?php

namespace App\Repositories;

use App\Interfaces\Repositories\DesktopTypeRepositoryInterface;
use App\Models\DesktopType;
use Illuminate\Support\Facades\Auth;

class DesktopTypeRepository implements DesktopTypeRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function index(){
        return DesktopType::all();
    }
    public function show($slug){
        return DesktopType::with('desktops')->where('slug', $slug)->firstOrFail();
    }
    public function store($data){
        $desktopType = new DesktopType();
        $desktopType->user_id = Auth::id();
        $desktopType->name = $data['name'];
        $desktopType->slug = $data['slug'];
        $desktopType->save();
        return $desktopType;

    }
    public function update($data, $id){
        $desktopType = $this->getById($id);
        $desktopType->user_id = Auth::id();
        $desktopType->name = $data['name'];
        $desktopType->slug = $data['slug'];
        $desktopType->save();
        return $desktopType;
    }
    public function destroy($id){
        $desktopType = $this->getById($id);
        $desktopType->delete();
        return;
    }
    public function getById($id){
        return DesktopType::findOrFail($id);
    }
}
