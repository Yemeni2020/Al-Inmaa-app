<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\banners ;
class BannersController extends Controller
{

    public function index()
    {

        $pageConfigs = ['pageHeader' => true];
        $breadcrumbs = [
            ["link" => "/", "name" => "Home"],
            ["name" => "banners"]
        ];
        $banner = banners::latest()->get();

        return view('admin.banner.extra-banner-create', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs, 'banner'=> $banner]);
    }
    public function create()
    {

        $pageConfigs = ['pageHeader' => true];
        $breadcrumbs = [
            ["link" => "/", "name" => "Home"],
            ["name" => "banners"]
        ];
        $banner = banners::latest()->get();
        return view('admin.banner.extra-banner-create',['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs,'banner'=> $banner]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image.*' => 'required|image|max:1024', // 1MB max
        ]);

        $imagePath = $request->file('image')->store('banners', 'public');

        banners::create([
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.banner.extra-banner-create')->with('success', 'Banner uploaded successfully!');
    }

    public function destroy(banners $banner ,Request $request)
    {
        $banner->delete();

        $request->session()->flash('success', 'slider was deleted');

        return back()->with('error', 'You do not have permission to edit this post.');
    }
}
