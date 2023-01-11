@extends('dashboard')
@section('user')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Inicio</a>
            <span></span> Mi Cuenta
        </div>
    </div>
</div>
<div class="page-content pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-auto">   
                <div class="row">

                    {{-- START COL MD 3 Menu --}}

                    @include('frontend.body.dashboard_sidebar_menu')

                    {{-- END COL MD 3 Menu --}}

                    <div class="col-md-9">
                        <div class="tab-content account dashboard-content pl-50">

                            <div class="tab-pane fade active show" id="dashboard" role="tabpanel"
                                aria-labelledby="dashboard-tab">

                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="mb-0">Your Orders</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table" style="background:#ddd;font-weight: 600;">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Fecha</th>
                                                        <th>Monto Total</th>
                                                        <th>Método de Pago</th>
                                                        <th>Factura</th>
                                                        <th>Estado</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($orders as $key => $order)

                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $order->order_date }}</td>
                                                        <td>{{ $order->amount }} Bs.</td>
                                                        <td>{{ $order->payment_method }}</td>
                                                        <td>{{ $order->invoice_no }}</td>
                                                        <td>

                                                            @if ($order->status == 'pendiente')

                                                            <span class="badge rounded-pill bg-warning">Pendiente</span>

                                                            @elseif ($order->status == 'confirmar')

                                                            <span class="badge rounded-pill bg-info">Confirmar</span>

                                                            @elseif ($order->status == 'procesando')

                                                            <span class="badge rounded-pill bg-danger">Procesando</span>

                                                            @elseif ($order->status == 'entregado')

                                                            <span class="badge rounded-pill bg-success">Entregado</span>

                                                            @endif

                                                        </td>
                                                        <td>
                                                            <a href="{{ url('user/order_details/'.$order->id) }}" class="btn-sm btn-success"><i class="fa fa-eye"></i> 
                                                                 Ver
                                                            </a>
                                                            <a href="#" class="btn-sm btn-danger"><i class="fa fa-download"></i>
                                                                 Factura
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    @endforeach
                                                    

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection