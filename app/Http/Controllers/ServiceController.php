<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
class ServiceController extends Controller
{
    public function index() {
        $services = Service::all();
        return view('services.index', data: compact('services'));
    }

    public function adminIndex() {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    public function create() {
        return view('admin.services.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('services', 'public') : null;

        Service::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service) {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->file('image')) {
            Storage::disk('public')->delete($service->image);
            $imagePath = $request->file('image')->store('services', 'public');
        } else {
            $imagePath = $service->image;
        }

        $service->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service) {
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}
