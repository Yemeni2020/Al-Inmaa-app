<div>
    <div class="py-16 bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-white text-center mb-12">{{__('locale.Brands')}}</h2>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-12 items-center">
                @foreach ($brands as $brand)
                    <div class="flex justify-center transform transition duration-300 ease-in-out hover:scale-110">
                        <div class="p-4 bg-white shadow-md rounded-lg">
                            <img src="{{ asset($brand['logo']) }}" alt="{{ $brand['name'] }}" class="h-24 w-24 object-contain">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
