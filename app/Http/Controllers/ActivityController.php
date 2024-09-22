<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController
{
    public static function logActivity($action)
    {
        Activity::create([
            'user_id' => Auth::id(),
            'action' => $action,
        ]);
    }
    public function getRecentActivities()
    {
        return Activity::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
    }
}
