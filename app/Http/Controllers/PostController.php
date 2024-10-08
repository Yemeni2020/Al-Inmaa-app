<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;


class PostController extends Controller
{

    public function index()
    {

        $pageConfigs = ['pageHeader' => true];
        $breadcrumbs = [
            ["link" => "/", "name" => "Home"],
            ["name" => "Posts"]
        ];
        $posts = Post::latest()->get();

        return view('admin.posts.app-posts-list', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs, 'posts'=> $posts]);
    }

    public function show(Post $post)
    {


        return view('blog-post', ['post' => $post]);
    }

    public function create()
    {
        // $this->authorize('create', Post::class);


        return view('admin.posts.app-posts-create', );

    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048|required', // تحقق من نوع الصور
        ]);

        // حفظ المنشور
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->id(), // Associate the post with the currently logged-in user
        ]);

        // حفظ الصور
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images_post');

                PostImage::create([
                    'post_id' => $post->id,
                    'image_path' => $path,

                ]);
            }
        }

        return redirect()->back()->with('success', 'About Us content updated successfully!');
    }


    public function edit(Post $post)
    {

        // $this->authorize('view', $post);

        return view('admin.posts.app-posts-edit', ['post' => $post]);
    }

    public function update(Request $request, $id)
    {
        // Validate input
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Validate new images
        ]);

        // Find the post
        $post = Post::findOrFail($id);

        // Optional: Check if the logged-in user is the owner of the post
        if ($post->user_id != auth()->id()) {
            return redirect()->back()->with('error', 'You do not have permission to edit this post.');
        }

        // Update the post's title and content
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        // Handle images (if any are uploaded)
        if ($request->hasFile('images')) {
            // Delete old images (optional)
            foreach ($post->images as $image) {
                // Delete the image from storage
                Storage::delete($image->image_path);
                // Delete image record from database
                $image->delete();
            }

            // Upload new images
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/images');
                PostImage::create([
                    'post_id' => $post->id,
                    'image_path' => $path,
                ]);
            }
        }

        // Redirect to the post with a success message
        // return redirect()->route('admin.posts.app-posts-list', $post->id)->with('success', 'Post and images updated successfully.');
        return redirect()->route('admin.posts.app-posts-list')->with('success', 'Post updated successfully!');
    }
    public function destroy(Post $post ,Request $request)
    {
        // $this->authorize('delete', $post);


        $post->delete();

        $request->session()->flash('successs', 'Post was deleted');

        return back()->with('error', 'You do not have permission to edit this post.');
    }




}
