<nav class="navbar navbar-expand-lg navbar-dark bgCNav">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('assets/images/JORAN.png') }}" style="width: 100px" alt="LOGO">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link {{  Request::is('/') ? 'active':'';}}" href="{{ url('/') }}">Inicio</a>
            </li>
          <li class="nav-item">
            <a class="nav-link {{  Request::is('category') ? 'active':'';}}" aria-current="page" href="{{ url('category') }}">Categorías</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{  Request::is('cart') ? 'active':'';}}" aria-current="page" href="{{ url('cart') }}"><i class="fa fa-shopping-cart"></i> Carrito</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{  Request::is('wishlist') ? 'active':'';}}" aria-current="page" href="{{ url('wishlist') }}"> <i class="fas fa-heart"></i> Favoritos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{  Request::is('know') ? 'active':'';}}" aria-current="page" href="{{ url('know') }}">Conócenos</a>
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
                            <a class="dropdown-item" href="{{ url('my-orders') }}">
                                Mis órdenes
                            </a>
                        </li>
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

  