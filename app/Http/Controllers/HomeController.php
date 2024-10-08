<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use App\Models\banners;
use App\Models\Post;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use romanzipp\Seo\Seo;
use romanzipp\Seo\Facades\Seo as SeoFacade;

class HomeController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // Check if the request is an AJAX call
        if ($request->ajax()) {
            // Handle the AJAX request for JSON response
            $users = Visitor::count();
            $sessions = 92000; // Simulate session data
            $bounceRate = 72.6; // Simulate bounce rate

            // Simulate session chart data
            $sessionsChartData = [300, 400, 450, 500, 480, 600, 700]; // Dummy data
            $sessionsChartLabels = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']; // Dummy labels

            // Optionally, calculate percentage metrics
            $usersPercentage = ($users / 1000) * 100;
            $sessionsPercentage = ($sessions / 100000) * 100;

            // Return data as JSON for the AJAX request
            return response()->json([
                'users' => $users,
                'sessions' => $sessions,
                'bounce_rate' => $bounceRate,
                'users_percentage' => $usersPercentage,
                'sessions_percentage' => $sessionsPercentage,
                'sessions_chart_data' => $sessionsChartData,
                'sessions_chart_labels' => $sessionsChartLabels,
            ]);
        }

        // If not an AJAX request, return the view
        $postCounts = Post::count();
        $bannerCounts = banners::count();
        $serviceCounts = Service::count();
        $userCounts = User::count();

        // Fetch session and visitor data
        $sessionsPerDay = DB::table('sessions')
            ->select(DB::raw('DATE(FROM_UNIXTIME(last_activity)) as date'), DB::raw('count(*) as sessions_count'))
            ->where('last_activity', '>=', Carbon::now()->subDays(7)->timestamp)
            ->groupBy('date')
            ->get();

        $visitData = Visitor::select(DB::raw('DATE(visited_at) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        // Prepare data for the chart
        $dates = $sessionsPerDay->pluck('date');
        $sessionCounts = $sessionsPerDay->pluck('sessions_count');

        return view('pages.dashboards', compact(
            'postCounts',
            'bannerCounts',
            'dates',
            'sessionCounts',
            'serviceCounts',
            'userCounts',
            'visitData'
        ));
    }


    public function homePage()
    {
        // SeoFacade::description('This is a description of your company.');
        // SeoFacade::keywords('company, services, products');

        // Eager load only the first image per post
        $post = Post::with(['images' => function ($query) {
            $query->limit(1); // Limit the images to 1 (first image)
        }])->get();

        return view('pages.guest-home-page', compact('post'));
        // return view('pages.guest-home-page',['post' => $post]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
