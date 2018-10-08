<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/admin') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto ml-auto">

            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item lang-{{App::getLocale()}}">
                    @php
                        $params = Route::current()->parameters;
                        $params = array_merge($params, request()->query());
                        $params["lang"]="es";
                        $ruta_es = route(Route::currentRouteName(), $params);
                        $params["lang"]="en";
                        $ruta_en = route(Route::currentRouteName(), $params);
                    @endphp
                    <a class="nav-link lang-en" href="{{$ruta_en}}">ENG</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"> /</a>
                </li>
                <li class="nav-item lang-{{App::getLocale()}}" style="margin-right: 25px;">
                    <a class="nav-link lang-es" href="{{$ruta_es}}">ESP</a>
                </li>
                <!-- Authentication Links -->
                @guest
                    {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="{{ route('login') }}">{{ __('auth.Login') }}</a>--}}
                    {{--</li>--}}
                @else
                    {{--onclick="App.ReadNotification();"--}}
                    <li class="nav-item notification">
                        <a class="nav-link fa fa-bell-o" href="{{ route('contacts.index') }}">
                        </a>
                        <span id="notificationCountBadge"></span>
                    </li>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('password.set', [App::getLocale()]) }}">
                                {{ __('auth.ChangePassword') }}
                            </a>
                            <a class="dropdown-item" href=""
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('auth.Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout', [App::getLocale()]) }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>