@if (null !== Auth::user())
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item nav-profile">
                <a href="{{ route('admin.user.show', Auth::User()->id) }}" class="nav-link">
                    <div class="profile-image">
                        <img class="img-xs rounded-circle" src="{{ Auth::User()->photo }}"
                            alt="{{ Auth::User()->name }}">
                        <div class="dot-indicator bg-success"></div>
                    </div>
                    <div class="text-wrapper">
                        <p class="profile-name">{{ Auth::User()->name }}</p>
                        <p class="designation">{{ Auth::User()->level }}</p>
                    </div>
                </a>
            </li>
            <li class="nav-item nav-category">Dashboard</li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.home') }}">
                    <i class="menu-icon typcn typcn-document-text"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            @foreach ($userPermissons as $item )

            @if($item->namePermission=="Manter Produto")
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.maintainProduct.index') }}">
                    <i class="menu-icon typcn typcn-document-text"></i>
                    <span class="menu-title">{{ $item->namePermission }}</span>
                </a>
            </li>
            @endif
            @if($item->namePermission=="Manter Categorias")
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.maintainCategory.index') }}">
                    <i class="menu-icon typcn typcn-document-text"></i>
                    <span class="menu-title">{{ $item->namePermission }}</span>
                </a>
            </li>
            @endif
            @if($item->namePermission=="Manter Marcas")
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.keepBrand.index') }}">
                    <i class="menu-icon typcn typcn-document-text"></i>
                    <span class="menu-title">{{ $item->namePermission }}</span>
                </a>
            </li>
            @endif

            @endforeach



            @if ('Administrador' == Auth::user()->level)
                <li class="nav-item mb-5">
                    <a class="nav-link" href="{{ route('admin.user.index') }}">
                        <i class="menu-icon typcn typcn-document-text"></i>
                        <span class="menu-title">Utilizadores</span>
                    </a>
                </li>
            @endif
            @endif
        </ul>
    </nav>

