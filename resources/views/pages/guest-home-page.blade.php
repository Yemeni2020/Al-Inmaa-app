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
        {{-- <!-- Featured Products Section -->
    <section id="products" class="py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold">{{__('locale.Featured Products')}}</h2>
            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($post as $posts)
                    <div class="bg-white p-6 shadow rounded-lg hover:shadow-lg transition-shadow duration-300">
                        <img src="{{ Storage::url($posts->images->first()->image_path) }}"
                                                        height="100%" alt="" srcset="">
                        <h3 class="text-xl font-semibold">{{ $posts->title }}</h3>
                        <p class="mt-2 text-gray-600">${{ 500 }}</p>
                        <a href="{{route('pages.post-detail', $posts->id)}}" class="text-blue-600 hover:underline">{{__('locale.Learn More')}}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section> --}}



        <!-- Contact Section -->

        {{-- <div class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <section id="content-types">
                    <div class="row"> --}}

        {{-- <div class="max-w-4xl mx-auto sm:px-3 lg:px-4"> --}}
        {{-- <div class="bg-white overflow-hidden col-md-12 shadow-xl sm:rounded-lg">
                            <div class="album py-5 bg-body">

                                <div class="container">

                                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                        @foreach ($post as $post)
                                            <div class="col">
                                                <div class="card shadow-sm">
                                                    <img src="{{ Storage::url($post->images->first()->image_path) }}"
                                                        height="100%" alt="" srcset="">
                                                    <div class="card-body">
                                                        <h4 class="card-title">{{ $post->title }}</h4>
                                                        <p class="card-text">
                                                            {{ Str::limit($post->content, '40', '.....') }}</p>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="btn-group">
                                                                <a class="btn btn-sm btn-outline-secondary" href="{{route('pages.post-detail', $post->id)}}">View</a>
                                                            </div>
                                                            <small
                                                                class="text-body-secondary">{{ $post->created_at->diffForHumans() }}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div> --}}




        {{-- @endforeach --}}
        <!-- Horizontal -->
        {{-- <div class="pb-1 mb-4"></div> --}}
        {{-- <div class="row mb-5">
                            <div class="col-md">
                                <div class="card mb-3">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img class="card-img card-img-left"
                                                src="{{ Storage::url($post->images->first()->image_path) }}"
                                                alt="Card image" />
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                <p class="card-text">{{ Str::limit($post->content, '50', '.....') }}
                                                </p>
                                                <p class="card-text"><small class="text-muted">Last updated
                                                        {{ $post->created_at->diffForHumans() }}</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="featurette-divider">
                            <div class="col-md">
                                <div class="card mb-3">
                                    <div class="row g-0">
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">
                                                    This is a wider card with supporting text below as a natural
                                                    lead-in to
                                                    additional
                                                    content.
                                                    This content is a little bit longer.
                                                </p>
                                                <p class="card-text"><small class="text-muted">Last updated 3 mins
                                                        ago</small></p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <img class="card-img card-img-right"
                                                src="{{ Storage::url($post->images->first()->image_path) }}"
                                                alt="Card image" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
        <!--/ Horizontal -->
        {{-- </div>
                        <hr class="featurette-divider">
                        @livewire('content-for-home-page')
                    <div class="row"> --}}


        <!-- Decks section start -->
        {{-- <section id="decks">
                            <div class="row match-height">
                                <div class="col-12 mt-3 mb-1">
                                    <h4 class="text-uppercase">Decks</h4>
                                </div>
                            </div>
                            <div class="row match-height">
                                <div class="col-12">
                                    <div class="card-deck-wrapper">
                                        <div class="card-deck">
                                            <div class="row no-gutters">
                                                <div class="col-md-3 col-sm-6 mb-sm-1">
                                                    <div class="card">
                                                        <img class="card-img-top img-fluid"
                                                            src="{{ asset('images/slider/01.jpg') }}"
                                                            alt="Card image cap" />
                                                        <div class="card-header">
                                                            <h4 class="card-title">Card title</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="card-text">
                                                                This card has supporting text below as a natural
                                                                lead-in to
                                                                additional content.
                                                            </p>
                                                            <small class="text-muted">Last updated 3 mins
                                                                ago</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-6 mb-sm-1">
                                                    <div class="card">
                                                        <img class="card-img-top img-fluid"
                                                            src="{{ asset('images/slider/04.jpg') }}"
                                                            alt="Card image cap" />
                                                        <div class="card-header">
                                                            <h4 class="card-title">Card title</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="card-text">
                                                                This card has supporting text below as a natural
                                                                lead-in to
                                                                additional content.
                                                            </p>
                                                            <small class="text-muted">Last updated 3 mins
                                                                ago</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="card">
                                                        <img class="card-img-top img-fluid"
                                                            src="{{ asset('images/slider/05.jpg') }}"
                                                            alt="Card image cap" />
                                                        <div class="card-header">
                                                            <h4 class="card-title">Card title</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="card-text">
                                                                This card has supporting text below as a natural
                                                                lead-in to
                                                                additional content.</p>
                                                            <small class="text-muted">Last updated 3 mins
                                                                ago</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="card">
                                                        <img class="card-img-top img-fluid"
                                                            src="{{ asset('images/slider/06.jpg') }}"
                                                            alt="Card image cap" />
                                                        <div class="card-header">
                                                            <h4 class="card-title">Card title</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="card-text">
                                                                This card has supporting text below as a natural
                                                                lead-in to
                                                                additional content.</p>
                                                            <small class="text-muted">Last updated 3 mins
                                                                ago</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section> --}}
        <!-- Decks section end -->
        {{--

                    </div>
            </div>
        </div>

        </section>
        </div> --}}

        <div>
            @livewire('brands-section')
        </div>

        <section id="contact" class="py-16 bg-blue-600 text-white">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-bold">{{ __('locale.Get in Touch') }}</h2>
                <p class="mt-4">{{ __('locale.message1') }}</p>
                <a href="/contact"
                    class="mt-8 inline-block bg-white text-blue-600 px-6 py-3 rounded-lg text-lg font-semibold hover:bg-gray-100 transition ease-in-out duration-300">{{ __('locale.Contact Us') }}</a>
            </div>
        </section>
    @endsection



    {{-- vendor scripts --}}

</x-app-layout>
