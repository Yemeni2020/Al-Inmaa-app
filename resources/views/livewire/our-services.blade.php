<div>

    <div class="services py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-10">{{__('locale.Our Services')}}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ($services as $service)
                <div class="p-4 bg-white shadow-lg rounded-lg">
                    <h3 class="text-xl font-semibold">{{ $service['title'] }}</h3>
                    <p>  {{ Str::limit($service['description'], '100', '.....') }}</p>
                    <a href="{{route('service-details', $service->id)}}" class="text-blue-600 hover:underline">Learn More</a>
                </div>
                @endforeach

            </div>
        </div>
        <div class="d-flex">
            <div class="mx-auto">
            {{$services->links()}}
            </div>
        </div>
    </div>


</div>
