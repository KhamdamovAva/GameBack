<?php
namespace App\Http\Controllers\v1\User;

use App\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Desktop\DesktopResource;
use App\Interfaces\Services\DesktopServiceInterface;

class DesktopController extends Controller
{
    use ResponseTrait;
    public function __construct(protected DesktopServiceInterface $desktopService)
    {
    }

    public function index()
    {
        $desktops = $this->desktopService->allDesktops();
        return $this->success(DesktopResource::collection($desktops), __('successes.desktop.all'));
    }
    public function show(string $slug)
    {
        $desktop = $this->desktopService->showDesktop($slug);
        return $this->success(new DesktopResource($desktop), __('successes.desktop.show'));
    }
}
