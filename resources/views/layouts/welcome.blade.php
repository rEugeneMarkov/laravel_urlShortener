<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Link Shortener</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="{{ route('welcome') }}"
                class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <span class="fs-4">Link Shortener</span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="{{ route('welcome') }}"
                        class="nav-link {{ Route::currentRouteName() == 'welcome' ? 'active' : '' }}">{{ __('auth.home') }}</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a href="{{ route('login') }}"
                            class="nav-link {{ url()->current() == route('login') ? 'active' : '' }}">{{ __('auth.login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}"
                            class="nav-link {{ url()->current() == route('register') ? 'active' : '' }}">{{ __('auth.register') }}</a>
                    </li>
                @else
                    <li class="nav-item"><a href="{{ route('personal.index') }}"
                            class="nav-link {{ url()->current() == route('personal.index') ? 'active' : '' }}">{{ __('auth.personal') }}</a>
                    </li>
                @endguest

                <li class="nav-item">
                    <form action="{{ route('locale.update') }}" method="POST">
                        @csrf
                        <select class="form-select form-select" name="locale" onchange="this.form.submit()">
                            <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                            <option value="ru" {{ app()->getLocale() == 'ru' ? 'selected' : '' }}>Русский</option>
                        </select>
                        {{-- <input type="hidden" name="route" value="{{ Route::currentRouteName() }}"> --}}
                    </form>
                </li>


            </ul>
        </header>
    </div>
    <div class="container">
        @yield('content')
    </div>
</body>

</html>
