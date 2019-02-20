<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\OneSignalNotification;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    public function NewsNotification(Request $request)
    {
        $user= User::all();

        Notification::send($user, new OneSignalNotification);
    }
}
