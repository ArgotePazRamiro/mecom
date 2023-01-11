@extends('dashboard')
@section('user')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

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
                                        <h3 class="mb-0">Hola {{ Auth::user()->name }}!</h3>
                                        <br>
                                        <img id="showImage"
                                            src="{{ (!empty($userData->photo)) ? url('upload/user_images/'.$userData->photo):url('upload/no_image.jpg') }}"
                                            alt="User" class="rounded-circle p-1 bg-primary" width="110">
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            Desde el panel de su cuenta usted puede comprobar fácilmente &amp; ver sus
                                            <a href="#">órdenes recientes</a>,<br />
                                            administrar sus <a href="#">direcciones de envío y facturación</a> y <a
                                                href="#">editar los detalles de su cuenta.</a>
                                        </p>
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