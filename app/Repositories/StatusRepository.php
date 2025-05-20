<?php

namespace App\Repositories;

use App\Models\Statuses\Status;
use App\Models\Products\Product;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\Repositories\StatusRepositoryInterface;

class StatusRepository extends BaseRepository implements StatusRepositoryInterface
{
    public function allStatuses(){
        $statuses = Status::with(['products.images' => function ($query) {
            $query->take(4);
        }])->get();
        return $statuses;
    }
    public function createStatus($data){
        $status = new Status();
        $status->user_id = Auth::id();
        $status->fill($data['translations']);
        $status->slug = $data['slug'];
        $status->save();
        return $status->load('translations');
    }
    public function updateStatus($data, $id){
        $status = $this->showStatus($id);
        $status->user_id = Auth::id();
        $status->fill($data['translations']);
        $status->slug = $data['slug'];
        $status->save();
        return $status->load('translations');
    }
    public function showStatus($id){
        $status = Status::findOrFail($id);
        return $status->load('translations');
    }
    public function getStatusBySlug($slug){
        return Status::where('slug', $slug)->firstOrFail();
    }
    public function destroyStatus($id){
        $status = $this->showStatus($id);
        $status->delete();
        return;
    }
}
