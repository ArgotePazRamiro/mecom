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

        @if (Auth::user()->can('brand.menu'))
            
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">Marcas</div>
                </a>
                <ul>
                    @if (Auth::user()->can('brand.list'))
                    <li>
                        <a href="{{ route('all.brand') }}"><i class="bx bx-right-arrow-alt"></i>Marcas Disponibles</a>
                    </li>
                    @endif
                    @if (Auth::user()->can('brand.add'))
                    <li>
                        <a href="{{ route('add.brand') }}"><i class="bx bx-right-arrow-alt"></i>Añadir Marca</a>
                    </li>
                    @endif

                </ul>
            </li>

        @endif

        @if (Auth::user()->can('cat.menu'))

            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-category"></i>
                    </div>
                    <div class="menu-title">Categoría</div>
                </a>
                <ul>
                    @if (Auth::user()->can('category.list'))
                    <li>
                        <a href="{{ route('all.category') }}"><i class="bx bx-right-arrow-alt"></i>Categorías
                            Disponibles</a>
                    </li>
                    @endif
                    @if (Auth::user()->can('category.add'))
                    <li>
                        <a href="{{ route('add.category') }}"><i class="bx bx-right-arrow-alt"></i>Añadir Categoría</a>
                    </li>
                    @endif

                </ul>
            </li>

        @endif

        @if (Auth::user()->can('subcategory.menu'))

            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-category"></i>
                    </div>
                    <div class="menu-title">SubCategoría</div>
                </a>
                <ul>
                    @if (Auth::user()->can('subcategory.list'))
                        <li>
                            <a href="{{ route('all.subcategory') }}"><i class="bx bx-right-arrow-alt"></i>SubCategorías
                                Disponibles</a>
                        </li>
                    @endif
                    @if (Auth::user()->can('subcategory.add'))
                        <li>
                            <a href="{{ route('add.subcategory') }}"><i class="bx bx-right-arrow-alt"></i>Añadir
                                SubCategoría</a>
                        </li>
                    @endif
                </ul>
            </li>

        @endif


        @if (Auth::user()->can('product.menu'))

            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-category"></i>
                    </div>
                    <div class="menu-title">Manejo de Productos</div>
                </a>
                <ul>
                    @if (Auth::user()->can('product.list'))
                        <li>
                            <a href="{{ route('all.product') }}"><i class="bx bx-right-arrow-alt"></i>Productos</a>
                        </li>
                    @endif
                    @if (Auth::user()->can('product.add'))
                        <li>
                            <a href="{{ route('add.product') }}"><i class="bx bx-right-arrow-alt"></i>Añadir Producto</a>
                        </li>
                    @endif

                </ul>
            </li>

        @endif

        @if (Auth::user()->can('slider.menu'))

            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-category"></i>
                    </div>
                    <div class="menu-title">Manejo de Slider</div>
                </a>
                <ul>
                    @if (Auth::user()->can('slider.list'))
                        <li>
                            <a href="{{ route('all.slider') }}"><i class="bx bx-right-arrow-alt"></i>Slider Disponibles</a>
                        </li>
                    @endif
                    @if (Auth::user()->can('slider.add'))
                        <li>
                            <a href="{{ route('add.slider') }}"><i class="bx bx-right-arrow-alt"></i>Añadir Slider</a>
                        </li>
                    @endif
                </ul>
            </li>

        @endif

        @if (Auth::user()->can('ads.menu'))

            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-category"></i>
                    </div>
                    <div class="menu-title">Manejo de Banner</div>
                </a>
                <ul>
                    @if (Auth::user()->can('ads.list'))
                        <li>
                            <a href="{{ route('all.banner') }}"><i class="bx bx-right-arrow-alt"></i>Banner Disponibles</a>
                        </li>
                    @endif
                    @if (Auth::user()->can('ads.add'))
                        <li>
                            <a href="{{ route('add.banner') }}"><i class="bx bx-right-arrow-alt"></i>Añadir Banner</a>
                        </li>
                    @endif
                </ul>
            </li>

        @endif

        @if (Auth::user()->can('coupon.menu'))

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Sistema de Cupones</div>
            </a>
            <ul>
                @if (Auth::user()->can('coupon.list'))
                    <li>
                        <a href="{{ route('all.coupon') }}"><i class="bx bx-right-arrow-alt"></i>Todos los Cupones</a>
                    </li>
                @endif
                @if (Auth::user()->can('coupon.add'))
                    <li>
                        <a href="{{ route('add.coupon') }}"><i class="bx bx-right-arrow-alt"></i>Añadir Cupón</a>
                    </li>
                @endif
            </ul>
        </li>

        @endif

        @if (Auth::user()->can('area.menu'))

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

        @endif

        <li class="menu-label">Elementos de Ventas</li>

        @if (Auth::user()->can('vendor.menu'))

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

        @endif

        @if (Auth::user()->can('order.menu'))

            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-cart'></i>
                    </div>
                    <div class="menu-title">Manejo de Órdenes</div>
                </a>
                <ul>
                    @if (Auth::user()->can('order.pending'))
                        <li>
                            <a href="{{ route('pending.order') }}"><i class="bx bx-right-arrow-alt"></i>Órdenes Pendientes</a>
                        </li>
                    @endif
                    @if (Auth::user()->can('order.confirmed'))
                        <li>
                            <a href="{{ route('admin.confirmed.order') }}"><i class="bx bx-right-arrow-alt"></i>Órdenes
                                Confirmadas</a>
                        </li>
                    @endif
                    @if (Auth::user()->can('order.processing'))
                        <li>
                            <a href="{{ route('admin.processing.order') }}"><i class="bx bx-right-arrow-alt"></i>Órdenes
                                Procesándose</a>
                        </li>
                    @endif
                    @if (Auth::user()->can('order.delivered'))
                        <li>
                            <a href="{{ route('admin.delivered.order') }}"><i class="bx bx-right-arrow-alt"></i>Órdenes
                                Entregadas</a>
                        </li>
                    @endif
                </ul>
            </li>

        @endif

        @if (Auth::user()->can('return.order.menu'))

            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-cart'></i>
                    </div>
                    <div class="menu-title">Órdenes Retornadas</div>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('return.request') }}"><i class="bx bx-right-arrow-alt"></i>Solicitudes de
                            Retorno</a>
                    </li>
                    <li>
                        <a href="{{ route('complete.return.request') }}"><i class="bx bx-right-arrow-alt"></i>Solicitud
                            Completa</a>
                    </li>
                </ul>
            </li>

        @endif

        @if (Auth::user()->can('report.menu'))

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

        @endif

        @if (Auth::user()->can('user.management.menu'))

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

        @endif

        @if (Auth::user()->can('blog.menu'))

            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-category"></i>
                    </div>
                    <div class="menu-title">Manejo de Blog</div>
                </a>
                <ul>

                    <li>
                        <a href="{{ route('admin.blog.category') }}"><i class="bx bx-right-arrow-alt"></i>Categorías de
                            Blog</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.blog.post') }}"><i class="bx bx-right-arrow-alt"></i>Blog Posteados</a>
                    </li>

                </ul>
            </li>

        @endif

        @if (Auth::user()->can('review.menu'))

            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-category"></i>
                    </div>
                    <div class="menu-title">Manejo de Reseñas</div>
                </a>
                <ul>

                    <li>
                        <a href="{{ route('pending.review') }}"><i class="bx bx-right-arrow-alt"></i>Reseñas Pendientes</a>
                    </li>
                    <li>
                        <a href="{{ route('publish.review') }}"><i class="bx bx-right-arrow-alt"></i>Reseñas Publicadas</a>
                    </li>

                </ul>
            </li>

        @endif

        @if (Auth::user()->can('site.menu'))

            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-category"></i>
                    </div>
                    <div class="menu-title">Manejo de Sitio</div>
                </a>
                <ul>

                    <li>
                        <a href="{{ route('site.setting') }}"><i class="bx bx-right-arrow-alt"></i>Configuración de
                            Sitio</a>
                    </li>
                    <li>
                        <a href="{{ route('seo.setting') }}"><i class="bx bx-right-arrow-alt"></i>Configuración SEO</a>
                    </li>

                </ul>
            </li>

        @endif

        @if (Auth::user()->can('stock.menu'))

            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-category"></i>
                    </div>
                    <div class="menu-title">Manejo de Stock</div>
                </a>
                <ul>

                    <li>
                        <a href="{{ route('product.stock') }}"><i class="bx bx-right-arrow-alt"></i>Stock de Productos</a>
                    </li>

                </ul>
            </li>

        @endif

        <li class="menu-label">Roles & Permisos</li>

        @if (Auth::user()->can('role.permission.menu'))

            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bx bx-line-chart"></i>
                    </div>
                    <div class="menu-title">Rol & Permiso</div>
                </a>
                <ul>
                    <li> 
                        <a href="{{ route('all.permission') }}"><i class="bx bx-right-arrow-alt"></i>Permisos</a>
                    </li>
                    <li> 
                        <a href="{{ route('all.roles') }}"><i class="bx bx-right-arrow-alt"></i>Roles</a>
                    </li>
                    <li> 
                        <a href="{{ route('add.roles.permission') }}"><i class="bx bx-right-arrow-alt"></i>Añadir Permisos a Rol</a>
                    </li>
                    <li> 
                        <a href="{{ route('all.roles.permission') }}"><i class="bx bx-right-arrow-alt"></i>Roles y Permisos</a>
                    </li>
                </ul>
            </li>

        @endif

        @if (Auth::user()->can('admin.user.menu'))

            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bx bx-line-chart"></i>
                    </div>
                    <div class="menu-title">Manejo Admin</div>
                </a>
                <ul>
                    <li> 
                        <a href="{{ route('all.admin') }}"><i class="bx bx-right-arrow-alt"></i>Administradores</a>
                    </li>
                    <li> 
                        <a href="{{ route('add.admin') }}"><i class="bx bx-right-arrow-alt"></i>Añadir Admin</a>
                    </li>
                </ul>
            </li>

        @endif

    </ul>
    <!--end navigation-->
</div>