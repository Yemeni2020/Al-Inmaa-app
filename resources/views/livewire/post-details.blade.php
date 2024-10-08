<div>
    <div class="max-w-4xl mx-auto px-4 py-6">
        <!-- Post Title -->
        <h1 class="text-4xl font-bold mb-4">{{ $post->title }}</h1>
        <!-- Post Content -->
        <hr class="featurette-divider">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($images as $image)
                <div class="relative group">
                    <img src="{{ Storage::url($image->image_path) }}"
                        class="w-full h-64 object-cover rounded-lg shadow-md transform group-hover:scale-105 transition-transform duration-300"
                        loading="lazy">
                    <div
                        class="absolute inset-0 bg-black opacity-0 group-hover:opacity-25 transition-opacity duration-300">
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Pagination Links -->
        <div class="mt-6">
            {{ $images->links() }}
        </div>
        <hr class="featurette-divider">

        <div class="text-lg text-gray-700 leading-relaxed mb-6">
            {!! nl2br(e($post->content)) !!}
        </div>






    </div>



</div>
