<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="/">Forbus</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <div>
                    <li class="nav-item">
                        {{--    <a href=""></a>   --}}
                    </li>
                </div>

                @if(Auth::user())
                    <div class="d-block d-lg-none">
                        <li class="nav-item">
                            <a href="/users/{{ Auth::user()->name }}" class="nav-link">Моя страница</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('questions.create') }}">Задать вопрос</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('settingsIndex') }}">Настройки</a></li>
                    </div>
                @else
                    <div class="d-block d-lg-none">
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Войти</a></li>
                        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Регистрация</a></li>
                    </div>
                @endif

            </ul>

            @if(Auth::user())
                <div class="d-none d-lg-block">
                    <x-settings-dropdown-header/>
                </div>
            @else
                <div class="d-none d-lg-block ">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Войти</a></li>
                        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Регистрация</a></li>
                    </ul>
                </div>
            @endif

        </div>
    </div>
</nav>
