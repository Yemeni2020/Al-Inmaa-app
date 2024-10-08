<div>
    <section id="products" class="py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold">{{__('locale.Featured Products')}}</h2>
            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($post as $posts)
                    <div class="bg-white p-6 shadow rounded-lg hover:shadow-lg transition-shadow duration-300">
                        <img src="{{ Storage::url($posts->images->first()->image_path) }}"
                                                        height="100%" alt="" srcset="">
                        <h3 class="text-xl font-semibold">{{ $posts->title }}</h3>
                        <p class="text-gray-600">{{ Str::limit($posts->content, '100', '.....') }}</p>
                        <p class="mt-2 text-gray-600">${{ 500 }}</p>
                        <a href="{{route('pages.post-detail', $posts->id)}}" class="text-blue-600 hover:underline">{{__('locale.Learn More')}}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Pagination Links -->
    <div class="d-flex">
        <div class="mx-auto">
        {{$post->links()}}
        </div>
    </div>

    <br>
</div>
