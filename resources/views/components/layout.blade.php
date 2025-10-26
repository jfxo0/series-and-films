<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport">
    {{--    <script src="https://cdn.tailwindcss.com"></script>--}}
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
{{--<nav>--}}
{{--    <ul>--}}
{{--        <x-nav-link href="{{route('home')}}" :active="request()->routeIs('home')">Home</x-nav-link>--}}
{{--        <x-nav-link href="{{route('about')}}" :active="request()->routeIs('about')"> about</x-nav-link>--}}
{{--        <x-nav-link>{{ Auth::user()->name }}</x-nav-link>--}}

{{--    </ul>--}}
{{--</nav>--}}

@if (Route::has('login'))
    <nav class="flex items-center justify-end gap-4 dark:bg-gray-800  border-b border-gray-100">
        @auth
{{--            <a--}}
{{--                href="{{ url('/dashboard') }}"--}}
{{--                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] dark:bg-gray-800  border-b border-gray-100 border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"--}}
{{--            >--}}
{{--                Dashboard--}}
{{--            </a>--}}
           <p class="text-fuchsia-500">hello {{ Auth::user()->name }}</p>
            <a
                href="{{ route('series.index') }}"
                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
            >
                Home
            </a>
            <a
                href="{{ route('profile.edit') }}"
                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
            >
                Profile
            </a>
            <a
                href="{{ route('series.create') }}"
                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
            >
                Create Serie
            </a>
        @else
            <a
                href="{{ route('login') }}"
                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
            >
                Log in
            </a>

            @if (Route::has('register'))
                <a
                    href="{{ route('register') }}"
                    class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                    Register
                </a>
            @endif
        @endauth
        <a
            href="{{ route('about') }}"
            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
        >
            About
        </a>

    </nav>
@endif
<body class="font-sans antialiased">

<main>
    {{ $slot }}
</main>
</div>
</body>
</html>
