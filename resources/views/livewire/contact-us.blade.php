<div>


    <div class="container mx-auto py-12">
        <div class="text-center mb-8">
            <h2 class="text-4xl font-bold text-gray-800">{{__('locale.Contact Us')}}</h2>
            <p class="lead text-muted">{{__('locale.Feel free to reach out to any of our branches.')}}</p>
        </div>
        <br>
        

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" style="display: ruby-text">
            @foreach($branches as $branch)
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">{{ $branch->name }}</h3>
                <p class="text-gray-600 mb-4">
                    <i class="fas fa-map-marker-alt text-indigo-500"></i>
                    {{ $branch->address }}
                </p>

                <!-- Phone Numbers -->
                <h5 class="text-lg font-semibold text-gray-700 mb-2">{{__('locale.Phone Numbers')}}</h5>
                <ul class="list-disc list-inside text-gray-600">
                    @foreach($branch->phones as $phone)
                    <li>
                        <i class="fas fa-phone-alt text-indigo-500"></i>
                        {{ $phone->phone_number }}
                    </li>
                    @endforeach
                </ul>

                <!-- Email Addresses -->
                <h5 class="text-lg font-semibold text-gray-700 mt-4 mb-2">{{__('locale.Email Addresses')}}</h5>
                <ul class="list-disc list-inside text-gray-600">
                    @foreach($branch->emails as $email)
                    <li>
                        <i class="fas fa-envelope text-indigo-500"></i>
                        {{ $email->email_address }}
                    </li>
                    @endforeach
                </ul>
            </div>
            
            @endforeach
        </div>
    </div>
</div>
