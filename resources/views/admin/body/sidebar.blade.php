<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('adminbackend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Administrador</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Marcas</div>
            </a>
            <ul>
                <li> 
                    <a href="{{ route('all.brand') }}"><i class="bx bx-right-arrow-alt"></i>Marcas Disponibles</a>
                </li>
                <li> 
                    <a href="{{ route('add.brand') }}"><i class="bx bx-right-arrow-alt"></i>Añadir Marca</a>
                </li>
                
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Categoría</div>
            </a>
            <ul>
                <li> 
                    <a href="{{ route('all.category') }}"><i class="bx bx-right-arrow-alt"></i>Categorías Disponibles</a>
                </li>
                <li> 
                    <a href="{{ route('add.category') }}"><i class="bx bx-right-arrow-alt"></i>Añadir Categoría</a>
                </li>
               
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">SubCategoría</div>
            </a>
            <ul>
                <li> 
                    <a href="{{ route('all.subcategory') }}"><i class="bx bx-right-arrow-alt"></i>SubCategorías Disponibles</a>
                </li>
                <li> 
                    <a href="{{ route('add.subcategory') }}"><i class="bx bx-right-arrow-alt"></i>Añadir SubCategoría</a>
                </li>
               
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manejo de Productos</div>
            </a>
            <ul>
                <li> 
                    <a href="{{ route('all.product') }}"><i class="bx bx-right-arrow-alt"></i>Productos</a>
                </li>
                <li> 
                    <a href="{{ route('add.product') }}"><i class="bx bx-right-arrow-alt"></i>Añadir Producto</a>
                </li>
               
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manejo de Slider</div>
            </a>
            <ul>
                <li> 
                    <a href="{{ route('all.slider') }}"><i class="bx bx-right-arrow-alt"></i>Slider Disponibles</a>
                </li>
                <li> 
                    <a href="{{ route('add.slider') }}"><i class="bx bx-right-arrow-alt"></i>Añadir Slider</a>
                </li>
               
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manejo de Banner</div>
            </a>
            <ul>
                <li> 
                    <a href="{{ route('all.banner') }}"><i class="bx bx-right-arrow-alt"></i>Banner Disponibles</a>
                </li>
                <li> 
                    <a href="{{ route('add.banner') }}"><i class="bx bx-right-arrow-alt"></i>Añadir Banner</a>
                </li>
               
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Sistema de Cupones</div>
            </a>
            <ul>
                <li> 
                    <a href="{{ route('all.coupon') }}"><i class="bx bx-right-arrow-alt"></i>Todos los Cupones</a>
                </li>
                <li> 
                    <a href="{{ route('add.coupon') }}"><i class="bx bx-right-arrow-alt"></i>Añadir Cupón</a>
                </li>
               
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Área de Envíos</div>
            </a>
            <ul>
                <li> 
                    <a href="{{ route('all.division') }}"><i class="bx bx-right-arrow-alt"></i>Comunas</a>
                </li>
                <li> 
                    <a href="{{ route('all.district') }}"><i class="bx bx-right-arrow-alt"></i>Distritos</a>
                </li>
                <li> 
                    <a href="{{ route('all.state') }}"><i class="bx bx-right-arrow-alt"></i>Zonas</a>
                </li>
               
            </ul>
        </li>

        <li class="menu-label">UI Elements</li>
        
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Manejo de Vendedor</div>
            </a>
            <ul>
                <li> 
                    <a href="{{ route('inactive.vendor') }}"><i class="bx bx-right-arrow-alt"></i>Vendedor Inactivo</a>
                </li>
                <li> 
                    <a href="{{ route('active.vendor') }}"><i class="bx bx-right-arrow-alt"></i>Vendedor Activo</a>
                </li>
                
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Manejo de Órdenes</div>
            </a>
            <ul>
                <li> 
                    <a href="{{ route('pending.order') }}"><i class="bx bx-right-arrow-alt"></i>Órdenes Pendientes</a>
                </li>
                <li> 
                    <a href="{{ route('admin.confirmed.order') }}"><i class="bx bx-right-arrow-alt"></i>Órdenes Confirmadas</a>
                </li>
                <li> 
                    <a href="{{ route('admin.processing.order') }}"><i class="bx bx-right-arrow-alt"></i>Órdenes Procesándose</a>
                </li>
                <li> 
                    <a href="{{ route('admin.delivered.order') }}"><i class="bx bx-right-arrow-alt"></i>Órdenes Entregadas</a>
                </li> 
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Órdenes Retornadas</div>
            </a>
            <ul>
                <li> 
                    <a href="{{ route('return.request') }}"><i class="bx bx-right-arrow-alt"></i>Solicitudes de Retorno</a>
                </li>
                <li> 
                    <a href="{{ route('complete.return.request') }}"><i class="bx bx-right-arrow-alt"></i>Solicitud Completa</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manejo de Reportes</div>
            </a>
            <ul>

                <li> 
                    <a href="{{ route('report.view') }}"><i class="bx bx-right-arrow-alt"></i>Búsqueda de Reportes</a>
                </li>
                <li> 
                    <a href="{{ route('order.by.user') }}"><i class="bx bx-right-arrow-alt"></i>Búsqueda por Usuario</a>
                </li>
               
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manejo de Usuarios</div>
            </a>
            <ul>

                <li> 
                    <a href="{{ route('all-user') }}"><i class="bx bx-right-arrow-alt"></i>Usuarios</a>
                </li>
                <li> 
                    <a href="{{ route('all-vendor') }}"><i class="bx bx-right-arrow-alt"></i>Vendedores</a>
                </li>
               
            </ul>
        </li>

        
        
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"> <i class="bx bx-donate-blood"></i>
                </div>
                <div class="menu-title">Icons</div>
            </a>
            <ul>
                <li> <a href="icons-line-icons.html"><i class="bx bx-right-arrow-alt"></i>Line Icons</a>
                </li>
                <li> <a href="icons-boxicons.html"><i class="bx bx-right-arrow-alt"></i>Boxicons</a>
                </li>
                <li> <a href="icons-feather-icons.html"><i class="bx bx-right-arrow-alt"></i>Feather Icons</a>
                </li>
            </ul>
        </li>
        





        
        
        
        
        <li class="menu-label">Charts & Maps</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-line-chart"></i>
                </div>
                <div class="menu-title">Charts</div>
            </a>
            <ul>
                <li> <a href="charts-apex-chart.html"><i class="bx bx-right-arrow-alt"></i>Apex</a>
                </li>
                <li> <a href="charts-chartjs.html"><i class="bx bx-right-arrow-alt"></i>Chartjs</a>
                </li>
                <li> <a href="charts-highcharts.html"><i class="bx bx-right-arrow-alt"></i>Highcharts</a>
                </li>
            </ul>
        </li>
        


        
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