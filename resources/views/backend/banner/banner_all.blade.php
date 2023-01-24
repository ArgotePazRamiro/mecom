@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Banner</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Banners Disponibles</li>
                </ol>
            </nav>
        </div>
        @if (Auth::user()->can('ads.add'))
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add.banner') }}" class="btn btn-primary"> Añadir Banner</a>
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
                            <th>Título de Banner</th>
                            <th>URL de Banner</th>
                            <th>Imagen de Banner</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ( $banner as $key => $item )
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->banner_title }}</td>
                            <td>{{ $item->banner_url }}</td>
                            <td><img src="{{ asset($item->banner_image) }}" style="width:70px;height:40px"></td>
                            <td>
                                @if (Auth::user()->can('ads.edit'))
                                <a href="{{ route('edit.banner',$item->id) }}" class="btn btn-info">Editar</a>
                                @endif
                                @if (Auth::user()->can('ads.delete'))
                                <a href="{{ route('delete.banner', $item->id) }}" class="btn btn-danger" id="delete">Eliminar</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Número de Serie</th>
                            <th>Título de Banner</th>
                            <th>URL de Banner</th>
                            <th>Imagen de Banner</th>
                            <th>Acción</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>



    
</div>


@endsection