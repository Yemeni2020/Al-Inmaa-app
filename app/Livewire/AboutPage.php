<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\About_us as AboutPageModel;

class AboutPage extends Component
{
    public $title;
    public $description;
    public $image;

    public function mount()
    {
        $aboutPage = AboutPageModel::first();

        if ($aboutPage) {
            $this->title = $aboutPage->title;
            $this->description = $aboutPage->description;
            $this->image = $aboutPage->image_path;
        }
    }


    public function render()
    {
        return view('livewire.about-page')
            ->layout('layouts.app');
    }
}
