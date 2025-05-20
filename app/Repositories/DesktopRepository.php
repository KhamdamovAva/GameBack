<?php

namespace App\Repositories;

use App\Events\AttachmentEvent;
use App\Models\Desktops\Desktop;
use App\Services\AttachmentService;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\Repositories\DesktopRepositoryInterface;

class DesktopRepository implements DesktopRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected AttachmentService $attachmentService)
    {
        //
    }
    public function index()
    {

        return Desktop::with('statuses.translations', 'attributes.translations', 'image', 'desktopType', 'desktopFps', 'desktopFps.game')->get();

    }

    public function store($data)
    {
        $desktop = new Desktop();
        $desktop->user_id = Auth::id();
        $desktop->desktop_type_id = $data['desktop_type_id'];
        $desktop->price = $data['price'];
        $desktop->type = $data['type'];
        $desktop->slug = $data['slug'];
        $desktop->discount = $data['discount'];
        $desktop->fill($data['translations']);
        $desktop->save();

        event(new AttachmentEvent($data['image'], $desktop->image()));
        $desktop->attributes()->attach($data['attributes']);
        $desktop->statuses()->attach($data['statuses']);
        $desktop->desktopFPS()->attach($data['desktopFPS']);

        return $desktop->load('statuses.translations', 'attributes.translations', 'image', 'desktopType', 'desktopFps.game');
    }

    public function update($data, $id)
    {

        $desktop = $this->getById($id);
        $desktop->desktop_type_id = $data['desktop_type_id'];
        $desktop->price = $data['price'];
        $desktop->type = $data['type'];
        $desktop->slug = $data['slug'];
        $desktop->discount = $data['discount'];
        $desktop->fill($data['translations']);
        $desktop->save();
        $desktop->attributes()->sync($data['attributes']);
        $desktop->statuses()->sync($data['statuses']);
        $desktop->desktopFPS()->sync($data['desktopFPS']);

        if (!empty($data['image']) && !empty($desktop->image) || !empty($data['image']) && empty($desktop->image)) {
            $this->attachmentService->destroy($desktop->image);
            event(new AttachmentEvent($data['image'], $desktop->image(), 'desktops'));
        }

        return $desktop->load('statuses.translations', 'attributes.translations', 'image', 'desktopType', 'desktopFps.game');
    }


    public function show($slug)
    {

        return Desktop::with('statuses.translations', 'attributes.translations', 'image', 'desktopType', 'desktopFps')->where('slug', $slug)->firstOrFail();
    }

    public function destroy($id)
    {
        $desktop = $this->getById($id);
        $desktop->attributes()->detach();
        $desktop->statuses()->detach();
        if (!empty($desktop->image)) {
            $this->attachmentService->destroy($desktop->image);
        }
        $desktop->delete();
        return;
    }

    public function getById($id)
    {
        return Desktop::findOrFail($id);
    }
}
