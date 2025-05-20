<?php
namespace App\Repositories;

use App\Interfaces\Repositories\DesktopFpsRepositoryInterface;
use App\Models\DesktopFPS;
use App\Services\AttachmentService;
use Illuminate\Support\Facades\Auth;

class DesktopFpsRepository implements DesktopFpsRepositoryInterface
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
        return DesktopFPS::with('game')->get();
    }
    public function store($data)
    {
        $fps = DesktopFPS::create([
            'user_id' => Auth::id(),
            'game_id' => (int)$data['game_id'],
            'resolution' => $data['resolution'],
            'fps_value' => $data['fps_value'],
        ]);

        return $fps->load('game');
    }
    public function update($data, $id)
    {
        $desktopFps = $this->show($id);
        $desktopFps->game_id = (int)$data['game_id'];
        $desktopFps->resolution = $data['resolution'];
        $desktopFps->fps_value = $data['fps_value'];
        $desktopFps->save();

        return $desktopFps->load('game');
    }
    public function show($id)
    {
        return DesktopFPS::with('game')->findOrFail($id);
    }
    public function delete($id)
    {
        $desktopFps = $this->show($id);
        $desktopFps->delete();
        return;
    }
}
