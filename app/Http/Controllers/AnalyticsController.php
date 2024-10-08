<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AnalyticsController extends Controller
{
    public function index()
    {
        // Query session data for the past 7 days
        $sessionsPerDay = DB::table('sessions')
            ->select(DB::raw('DATE(FROM_UNIXTIME(last_activity)) as date'), DB::raw('count(*) as sessions_count'))
            ->where('last_activity', '>=', Carbon::now()->subDays(7)->timestamp)
            ->groupBy('date')
            ->get();

        // Prepare data for the chart
        $dates = $sessionsPerDay->pluck('date');
        $sessionCounts = $sessionsPerDay->pluck('sessions_count');

        return view('analytics.index', compact('dates', 'sessionCounts'));
    }
}
