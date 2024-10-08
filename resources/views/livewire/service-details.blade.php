<div>
    <div class="max-w-7xl mx-auto py-12">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">{{ $service->title }}</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">{{__('locale.Detailed information about the service.')}}</p>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">{{__('locale.Title')}}</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $service->title }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">{{__('locale.Description')}}</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $service->description }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">{{__('locale.Image')}}</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            @if ($service->image)
                                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="w-full h-auto rounded-lg shadow-md">
                            @else
                                <p class="text-gray-500">{{__('locale.No image available.')}}</p>
                            @endif
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
        <div class="mt-6">
            <a href="{{ route('services') }}" class="text-indigo-600 hover:text-indigo-900">
                {{__('locale.Back to Services')}}
            </a>
        </div>
    </div>
</div>
