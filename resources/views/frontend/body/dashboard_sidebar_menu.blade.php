
@php
    
    $route = Route::current()->getName();

@endphp

<div class="col-md-3">
    <div class="dashboard-menu">
        <ul class="nav flex-column" role="tablist">
            <li class="nav-item">
                <a class="nav-link {{ ($route == 'dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <i class="fi-rs-settings-sliders mr-10"></i>
                    Panel de Usuario
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($route == 'user.order.page') ? 'active' : '' }}" href="{{ route('user.order.page') }}"><i class="fi-rs-shopping-bag mr-10"></i>
                    Ordenes
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($route == 'return.order.page') ? 'active' : '' }}" href="{{ route('return.order.page') }}"><i class="fi-rs-shopping-bag mr-10"></i>
                    Ordenes Retornadas
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#track-orders"><i class="fi-rs-shopping-cart-check mr-10"></i>
                    Sigue tu Orden
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#address"><i class="fi-rs-marker mr-10"></i>
                    Mi Dirección
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($route == 'user.account.page') ? 'active' : '' }}" href="{{ route('user.account.page') }}"><i class="fi-rs-user mr-10"></i>
                    Detalles de Cuenta
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ ($route == 'user.change.password') ? 'active' : '' }}" href="{{ route('user.change.password') }}"><i class="fi-rs-user mr-10"></i>
                    Cambiar Contraseña
                </a>
            </li>

            <li class="nav-item" style="background: #ddd">
                <a class="nav-link" href="{{ route('user.logout') }}"><i class="fi-rs-sign-out mr-10"></i>
                    Desconectar
                </a>
            </li>
        </ul>
    </div>
</div>