<nav class="navbar navbar-expand-lg navbar-dark bgCNav">
    <div class="container">
      <a class="navbar-brand" href="{{ url('index') }}">
        <img src="{{ asset('assets/images/LION.png') }}" style="width: 100px" alt="LOGO">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link {{  Request::is('index') ? 'active':'';}}" href="{{ url('index') }}">Inicio</a>
            </li>
          <li class="nav-item">
            <a class="nav-link {{  Request::is('mr') ? 'active':'';}}" aria-current="page" href="{{ url('mr') }}"><i class="fa-solid fa-people-roof"></i> Salas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{  Request::is('customer') ? 'active':'';}}" aria-current="page" href="{{ url('customer') }}"><i class="fa-solid fa-users-line"></i> Clientes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{  Request::is('appointment') ? 'active':'';}}" aria-current="page" href="{{ url('appointment') }}"> <i class="fa-solid fa-calendar-days"></i> Reservas</a>
          </li>

          <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ url('profile') }}">
                                Mi perfil
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            @endguest
        </ul>
      </div>
    </div>
  </nav>

  