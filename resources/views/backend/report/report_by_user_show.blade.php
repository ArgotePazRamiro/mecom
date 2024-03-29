@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Reportes Ordenados por Usuario</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Reportes Ordenados por Usuario</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <h3>Usuario: {{ $users }}</h3>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Factura</th>
                            <th>Monto</th>
                            <th>Método de Pago</th>
                            <th>Estado</th> 
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ( $orders as $key => $item )
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->order_date }}</td>
                            <td>{{ $item->invoice_no }}</td>
                            <td>{{ $item->amount }} Bs.</td>
                            <td>{{ $item->payment_method }}</td>
                            <td><span class="badge rounded-pill bg-success">{{ $item->status }}</span></td>
                            <td>
                                <a href="{{ route('admin.order.details', $item->id) }}" class="btn btn-info" title="Detalles">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.invoice.download', $item->id) }}" class="btn btn-danger" title="PDF Factura">
                                    <i class="fa fa-download"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Factura</th>
                            <th>Monto</th>
                            <th>Método de Pago</th>
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