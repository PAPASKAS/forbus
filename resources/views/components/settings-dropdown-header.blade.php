<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="headerBtn" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="headerBtn">
        <li><a href="/users/{{ Auth::user()->name }}" class="dropdown-item">Моя страница</a></li>
        <li><a class="dropdown-item" href="{{ route('questions.create') }}">Задать вопрос</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="{{ route('settingsIndex') }}">Настройки</a></li>
    </ul>
</div>
