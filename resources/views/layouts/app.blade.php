<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app" class="container">
        <application-wrapper v-cloak>

            <div slot="navigation">
                @include('layouts.navigation')
            </div>

            @yield('content')

        </application-wrapper>
    </div>

    <!-- Scripts -->
    @include('layouts.scripts')

</body>
</html>
