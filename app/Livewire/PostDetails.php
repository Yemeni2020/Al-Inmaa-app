<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;

class PostDetails extends Component
{
    public $postId;
    public $post;

    public function mount($postId)
    {
        $this->postId = $postId;
        // $this->post = Post::with('images')->findOrFail($postId);
        $this->post = Post::findOrFail($postId);
    }

    public function render()
    {
        $images = $this->post->images()->paginate(6);
        return view('livewire.post-details', [
            'post' => $this->post,
            'images' => $images,
        ])
        ->layout('layouts.app');
    }


}
