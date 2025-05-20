<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\NotificationResource;
use App\Interfaces\Services\NotificationServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class NotificationController extends Controller
{
    public function __construct(protected NotificationServiceInterface $notificationService){

    }
    public function index(){
        $unReadNotifications = auth()->user()->unReadNotifications;
        return $this->success(NotificationResource::collection($unReadNotifications), __('successes.notify.all'));
    }
    public function show($id){
        $notify = $this->notificationService->showNotify($id);
        if ($notify && $notify['data']['type'] == 'order') {
            $redirectUrl = config('app.url') . "/admin/orders/{$notify['data']['order_id']}";
        } elseif ($notify && $notify['data']['type'] == 'contact') {
            $redirectUrl = config('app.url') . "/admin/contacts/{$notify['data']['contact_id']}";
        } else {
            return $this->error(__('errors.notify.not_found'), 404);
        }
        $notify->markAsRead();
        return $this->success($redirectUrl, __('successes.notify.mark_read'));
    }
}
