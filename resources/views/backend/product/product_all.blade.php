@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Productos</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Productos Disponibles <span
                            class="badge rounded-pill bg-danger "> {{ count($products) }}</span></li>
                </ol>
            </nav>
        </div>
        @if (Auth::user()->can('product.add'))
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('add.product') }}" class="btn btn-primary"> Añadir Producto</a>
            </div>
        </div>
        @endif
    </div>
    <!--end breadcrumb-->

    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Imagen</th>
                            <th>Nombre de Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Descuento</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ( $products as $key => $item )
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>
                                <img src="{{ asset($item->product_thambnail) }}" style="width:70px;height:40px">
                            </td>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->selling_price }}</td>
                            <td>{{ $item->product_qty }}</td>
                            <td>
                                @if ($item->discount_price == NULL)

                                <span class="badge rounded-pill bg-info">Sin Descuento</span>

                                @else

                                @php
                                $amount = $item->selling_price - $item->discount_price;
                                $discount = ($amount/$item->selling_price) * 100;
                                @endphp

                                <span class="badge rounded-pill bg-danger">{{ round($discount) }}%</span>

                                @endif


                            </td>
                            <td>
                                @if ($item->status == 1)

                                <span class="badge rounded-pill bg-success">Activo</span>

                                @else

                                <span class="badge rounded-pill bg-danger">Inactivo</span>

                                @endif
                            </td>
                            <td>
                                @if (Auth::user()->can('product.edit'))
                                <a href="{{ route('edit.product',$item->id) }}" class="btn btn-info" title="Editar"><i
                                        class="fa fa-pencil"></i></a>
                                @endif
                                @if (Auth::user()->can('product.delete'))
                                <a href="{{ route('delete.product', $item->id) }}" class="btn btn-danger" id="delete"
                                    title="Eliminar"><i class="fa fa-trash"></i></a>
                                @endif

                                @if ($item->status == 1)

                                <a href="{{ route('product.inactive',$item->id) }}" class="btn btn-primary"
                                    title="Inactivo"><i class="fa-solid fa-thumbs-down"></i></a>
                                @else

                                <a href="{{ route('product.active',$item->id) }}" class="btn btn-primary"
                                    title="Activo"><i class="fa-solid fa-thumbs-up"></i></a>

                                @endif
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Serial</th>
                            <th>Imagen</th>
                            <th>Nombre de Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Descuento</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>




</div>


@endsection