@php
    
    $id = Auth::user()->id;
    $vendorId = App\Models\User::find($id);
    $status = $vendorId->status;

@endphp

<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('adminbackend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Vendedor</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('vendor.dashboard') }}">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        @if ($status === 'active')

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Manejo de Productos</div>
            </a>
            <ul>
                <li> 
                    <a href="{{ route('vendor.all.product') }}"><i class="bx bx-right-arrow-alt"></i>Productos</a>
                </li>
                <li> 
                    <a href="{{ route('vendor.add.product') }}"><i class="bx bx-right-arrow-alt"></i>Añadir Producto</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manejo de Ordenes</div>
            </a>
            <ul>
                <li> 
                    <a href="{{ route('vendor.order') }}"><i class="bx bx-right-arrow-alt"></i>Ordenes Hechas</a>
                </li>
                <li> 
                    <a href="{{ route('vendor.return.order') }}"><i class="bx bx-right-arrow-alt"></i>Ordenes Regresadas</a>
                </li>
                <li> 
                    <a href="{{ route('vendor.complete.return.order') }}"><i class="bx bx-right-arrow-alt"></i>Ordenes Regresadas por Completo</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manejo de Reseñas</div>
            </a>
            <ul>

                <li> 
                    <a href="{{ route('vendor.all.review') }}"><i class="bx bx-right-arrow-alt"></i>Reseñas</a>
                </li>

            </ul>
        </li>

        @else

        @endif
           
        <li>
            <a href="https://themeforest.net/user/codervent" target="_blank">
                <div class="parent-icon"><i class="bx bx-support"></i>
                </div>
                <div class="menu-title">Support</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>