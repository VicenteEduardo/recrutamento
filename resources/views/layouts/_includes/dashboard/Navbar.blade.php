<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="{{ route('admin.home') }}">
            <img class="img-responsive" width="10" height="98" src="{{ asset('Site/img/logo/logo.png') }}"
                alt="logo" /> </a>
        <a class="navbar-brand brand-logo-mini" href="{{ route('admin.home') }}">
            <img class="img-responsive" src="{{ asset('Site/img/logo/logo.png') }}" width="400" height="500"
                alt="logo" /> </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block">Helpdesk: vicentemanueleduardo@gmail.com
            </li>

        </ul>
        <form class="ml-auto search-form d-none d-md-block" action="#">
            <div class="form-group">
                <input type="search" class="form-control" placeholder="Search Here">
            </div>
        </form>
        <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
                <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown"
                    aria-expanded="false">
                    <img class="img-xs rounded-circle" src="{{ Auth::User()->photo }}" alt="{{ Auth::User()->name }}">
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <div class="dropdown-header text-center">
                        <img class="img-md rounded-circle" src="{{ Auth::User()->photo }}"
                            alt="{{ Auth::User()->name }}">
                        <p class="mb-1 mt-3 font-weight-semibold">{{ Auth::User()->name }}</p>
                        <p class="font-weight-light text-muted mb-0">{{ Auth::User()->email }}</p>
                    </div>

                    @if (Auth::User()->level == 'Grossistas' ||
                            Auth::User()->level == 'Semi-Grossistas' ||
                            Auth::User()->level == 'Distribuidores')
                        <a class="dropdown-item" href="{{ route('admin.client.show', Auth::User()->id) }}">Meu Perfil
                            <i class="dropdown-item-icon ti-dashboard"></i>
                        </a>
                        <a class="dropdown-item" href="{{ route('admin.client.edit', Auth::User()->id) }}">Editar Meu Perfil
                            <i class="dropdown-item-icon ti-dashboard"></i>
                        </a>
                    @else
                        <a class="dropdown-item" href="{{ route('admin.user.show', Auth::User()->id) }}">Meu Perfil
                            <i class="dropdown-item-icon ti-dashboard"></i>
                        </a>
                    @endif


                    <a class="dropdown-item"
                        href="{{ route('admin.user.activity', Auth::User()->id) }}">Actividades</a>
                    <a class="dropdown-item" href="{{ route('admin.user.edit', Auth::User()->id) }}">Definições</a>
                    <a class="dropdown-item"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        href="{{ route('logout') }}">Terminar a Sessão<i
                            class="dropdown-item-icon ti-power-off"></i></a>



                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
