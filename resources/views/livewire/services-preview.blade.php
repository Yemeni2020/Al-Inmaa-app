<div>
    <div class="container mx-auto py-12">
        <h2 class="text-3xl font-bold mb-6 text-gray-800">{{__('locale.Our Services')}}</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($services as $service)
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h3 class="text-xl font-semibold">{{ $service->name }}</h3>
                    <p class="text-gray-600">{{ Str::limit($service->description, '200', '.....') }}</p>
                    {{-- <span class="text-gray-800 font-bold">${{ $service->price }}</span> --}}
                    <br>
                    <a href="{{route('service-details', $service->id)}}" class="text-blue-600 hover:underline">{{__('locale.Learn More')}}</a>
                </div>

            @endforeach
        </div>

        <!-- Link to see more services -->
        <div class="mt-6">
            <a href="{{ route('services') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold">
                {{__('locale.See More Services')}}
            </a>
        </div>
    </div>
</div>
