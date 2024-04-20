<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | {{ config('app.name') }}</title>
    <link href="{{ asset('back/dist/css/tabler.min.css?1695847769') }}" rel="stylesheet"/>
    <link href="{{ asset('back/dist/css/tabler-flags.min.css?1695847769') }}" rel="stylesheet"/>
    <link href="{{ asset('back/dist/css/tabler-payments.min.css?1695847769') }}" rel="stylesheet"/>
    <link href="{{ asset('back/dist/css/tabler-vendors.min.css?1695847769') }}" rel="stylesheet"/>
    <link href="{{ asset('back/dist/css/demo.min.css?1695847769') }}" rel="stylesheet"/>
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <style>
        @import url('https://rsms.me/inter/inter.css');
        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body>
    @include('layouts.navbar')
    <div class="container py-4">
        {{-- page content goes here --}}
        @yield('content')
    </div>
    <script src="{{ asset('back/dist/js/tabler.min.js?1695847769') }}" defer></script>
    <script src="{{ asset('back/dist/js/demo.min.js?1695847769') }}" defer></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    @yield('scripts')
</body>

</html>
