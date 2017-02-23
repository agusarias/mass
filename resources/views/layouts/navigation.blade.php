<md-toolbar>
    <md-button class="md-icon-button">
        <md-icon>menu</md-icon>
    </md-button>

    <h2 class="md-title" style="flex: 1">{{ config('app.name', 'Laravel') }}</h2>

    <user-menu @if(Auth::guest()) guest @else user="{{ Auth::user()->name }}" @endif
            route-login="{{ route('login') }}"
            route-register="{{ route('register') }}"
            route-logout="{{ route('logout') }}"></user-menu>

</md-toolbar>