<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About_us as AboutUs;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class AdminAboutUsController extends Controller
{
    public function edit()
    {
        $aboutUs = AboutUs::first();
        return view('admin.extra-about-us', compact('aboutUs'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        AboutUs::updateOrCreate([], ['title'=>$request->title, 'description' => $request->description]);

        return redirect()->route('admin.extra-about-us')->with('success', 'تم تحديث محتوى "حولنا" بنجاح!');
    }
}
