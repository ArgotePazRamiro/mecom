@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Roles</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Roles</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('add.roles') }}" class="btn btn-primary">Añadir Rol</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre de Rol</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ( $roles as $key => $item )
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <a href="{{ route('edit.roles',$item->id) }}" class="btn btn-info">Editar</a>
                                <a href="{{ route('delete.roles', $item->id) }}" class="btn btn-danger" id="delete">Eliminar</a>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nombre de Rol</th>
                            <th>Acción</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>



    
</div>


@endsection