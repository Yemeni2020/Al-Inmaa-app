
@isset($pageConfigs)
    {!! Helper::updatePageConfig($pageConfigs) !!}
@endisset
@php
    // confiData variable layoutClasses array in Helper.php file.
    $configData = Helper::applClasses();
@endphp
<!DOCTYPE html>
<html class="loading"
    lang="@if (session()->has('locale')) {{ session()->get('locale') }} @else {{ $configData['defaultLanguage'] }} @endif"
    data-asset-path="{{ asset('/') }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}"
    data-textdirection="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<!-- BEGIN: Head-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('description', 'Default description for SEO')">
    <meta name="keywords" content="@yield('keywords', 'company, services')">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Company Website') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="{{ asset('fonts/fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700"
        rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/ico/logo.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    {{-- <title>Company Website</title> --}}
    @vite(['resources/css/bootstrap.min.css', 'resources/css/fixStyle.css', 'resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body>
    <x-banner />
    <header class="bg-white shadow">

        <!-- Language Switcher -->

        @include('navigation-menu')

        </div>

    </header>
    <div class="min-h-screen bg-gray-100">
        <main>
            {{ $slot }}
        </main>
        <main>
            @yield('content')
        </main>
    </div>

    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto flex justify-between">
            <p>&copy; {{ date('Y') }} {{ __('locale.AL-INMAA TREADING Company.') }} &copy;
                {{ __('locale.All Rights Reserved') }} &copy;.</p>
            <div>
                <a href="{{ route('privacy-policy') }}"
                    class="text-gray-400 hover:text-white mx-2">{{ __('locale.Privacy Policy') }}</a>
                <a href="{{ route('terms-of-service') }}"
                    class="text-gray-400 hover:text-white mx-2">{{ __('locale.Terms of Service') }}</a>
                <a href="{{ route('usage-policy') }}"
                    class="text-gray-400 hover:text-white mx-2">{{ __('locale.Usage Policy') }}</a>
            </div>
        </div>
    </footer>

    @stack('modals')

    @livewireScripts



</body>

</html>
