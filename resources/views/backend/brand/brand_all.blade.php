@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Marcas</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Marcas Disponibles</li>
                </ol>
            </nav>
        </div>
        @if (Auth::user()->can('brand.add'))
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('add.brand') }}" class="btn btn-primary"> Añadir Marca</a>
            </div>
        </div>
        @endif
    </div>
    <!--end breadcrumb-->

    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Número de Serie</th>
                            <th>Nombre de Marca</th>
                            <th>Imagen</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ( $brands as $key => $item )
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->brand_name }}</td>
                            <td><img src="{{ asset($item->brand_image) }}" style="width:70px;height:40px"></td>
                            <td>
                                @if (Auth::user()->can('brand.edit'))
                                <a href="{{ route('edit.brand',$item->id) }}" class="btn btn-info">Editar</a>
                                @endif
                                @if (Auth::user()->can('brand.delete'))
                                <a href="{{ route('delete.brand', $item->id) }}" class="btn btn-danger" id="delete">Eliminar</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Número de Serie</th>
                            <th>Nombre de Marca</th>
                            <th>Imagen</th>
                            <th>Acción</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>



    
</div>


@endsection