<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity; // Pastikan import ini ada

class ActivityLogController extends Controller
{
    public function index()
    {
        $logs = Activity::where('causer_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('backend.content.activity_log.index', compact('logs'));
    }
}
