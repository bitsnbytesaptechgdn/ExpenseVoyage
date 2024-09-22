<?php

namespace App\Http\View\Composers;

use App\Models\Activity;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class RecentActivitiesComposer
{
    public function compose(View $view)
    {
        if (Auth::check()) {
            $recentActivities = Activity::where('user_id', Auth::id())
                ->latest()
                ->take(3)
                ->get();
        } else {
            $recentActivities = collect();
        }

        $view->with('recentActivities', $recentActivities);
    }
}
