<div>
    <div class="container mx-auto py-12 ">
        <h2 class="text-3xl font-bold mb-6 text-gray-800">{{__('locale.Our Products')}}</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($products as $product)
                <div class="bg-white shadow-md rounded-lg p-4">
                    <img src="{{ Storage::url($product->images->first()->image_path) }}"
                                                        height="100%" alt="" srcset="">
                    <h3 class="text-xl font-semibold">{{ $product->title }}</h3>
                    <p class="text-gray-600">{{ Str::limit($product->content, '100', '.....') }}</p>
                    {{-- <span class="text-gray-800 font-bold">$500</span> --}}
                    <a href="{{route('pages.post-detail', $product->id)}}" class="text-blue-600 hover:underline">{{__('locale.Learn More')}}</a>
                </div>
            @endforeach
        </div>

        <!-- Link to see more products -->
        <div class="mt-6">
            <a href="{{ route('products') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold">
                {{__('locale.See More Products')}}
            </a>
        </div>
    </div>
</div>
