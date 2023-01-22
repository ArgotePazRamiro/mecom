@extends('dashboard')
@section('user')

@section('title')

Siga su Orden

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Inicio</a>
            <span></span> Siga su Orden
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
                                        <h5>Siga su Orden</h5>
                                    </div>
                                    <div class="card-body">

                                        <form method="post" action="{{ route('order.tracking') }}">

                                            @csrf

                                            <div class="row">

                                                <div class="form-group col-md-12">

                                                    <label>Código de Factura<span class="required">*</span></label>
                                                    <input class="form-control" name="code" type="text"
                                                        placeholder="Número de Factura del Pedido" required="" />

                                                </div>

                                                <div class="col-md-12">
                                                    <button type="submit"
                                                        class="btn btn-fill-out submit font-weight-bold" name="submit"
                                                        value="Submit">Seguir Orden</button>
                                                </div>

                                            </div>

                                        </form>
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