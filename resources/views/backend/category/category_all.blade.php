@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Categorías</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Categorías Disponibles</li>
                </ol>
            </nav>
        </div>
        @if (Auth::user()->can('category.add'))
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add.category') }}" class="btn btn-primary"> Añadir Categoría</a>
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
                            <th>Nombre de Categoría</th>
                            <th>Imagen</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ( $categories as $key => $item )
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->category_name }}</td>
                            <td><img src="{{ asset($item->category_image) }}" style="width:70px;height:40px"></td>
                            <td>
                                @if (Auth::user()->can('category.edit'))
                                <a href="{{ route('edit.category',$item->id) }}" class="btn btn-info">Editar</a>
                                @endif
                                @if (Auth::user()->can('category.delete'))
                                <a href="{{ route('delete.category', $item->id) }}" class="btn btn-danger" id="delete">Eliminar</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Número de Serie</th>
                            <th>Nombre de Categoría</th>
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