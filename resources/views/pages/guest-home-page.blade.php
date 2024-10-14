<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    @section('content')
    {{-- @livewire('swiper-component') --}}

    <section class="relative bg-cover bg-center h-screen text-white"
        style="background-image: url('images/pages/1.png'); ">
        <div class="container mx-auto h-full flex flex-col justify-center items-center text-center">
            <h1 class="text-5xl font-bold">{{ __('locale.Welcome') }}</h1>
            <p class="text-xl mt-4">{{ __('locale.offer') }}</p>
            <div class="mt-8">
                <a href="#contact"
                    class="bg-blue-600 px-6 py-3 rounded-lg text-lg font-semibold hover:bg-blue-700 transition ease-in-out duration-300">{{ __('locale.Contact Us') }}</a>
                <a href="#products"
                    class="bg-white text-blue-600 px-6 py-3 rounded-lg ml-4 text-lg font-semibold hover:bg-gray-100 transition ease-in-out duration-300">{{ __('locale.View Products') }}</a>
            </div>
        </div>
    </section>


    <!-- Services Preview Section -->
    @livewire('services-preview')

    <hr>
    <!-- Product Preview Section -->
    @livewire('products-preview')
    



    

    <div>
        @livewire('brands-section')
    </div>

    <section id="contact" class="py-16 bg-blue-600 text-white">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold">{{ __('locale.Get in Touch') }}</h2>
            <p class="mt-4">{{ __('locale.message1') }}</p>
            <a href="{{ route('contact-us') }}"
                class="mt-8 inline-block bg-white text-blue-600 px-6 py-3 rounded-lg text-lg font-semibold hover:bg-gray-100 transition ease-in-out duration-300">{{ __('locale.Contact Us') }}</a>
        </div>
    </section>
    @endsection



    {{-- vendor scripts --}}

</x-app-layout>