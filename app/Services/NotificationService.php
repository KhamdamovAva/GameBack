<?php

namespace App\Services;

use App\Interfaces\Services\NotificationServiceInterface;

class NotificationService extends BaseService implements NotificationServiceInterface
{
    /**
     * Create a new class instance.
     */
    public function showNotify($id)
    {
        $notify = auth()->user()->unreadNotifications()->where('id', $id)->first();
        return $notify;
    }
}
