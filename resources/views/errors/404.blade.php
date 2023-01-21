@extends('frontend.master_dashboard')
@section('main')


@section('title')

Página 404

@endsection

<div class="page-content pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-10 col-md-12 m-auto text-center">
                <p class="mb-20"><img src="{{ asset('frontend/assets/imgs/page/page-404.jpg') }}" alt=""
                        class="hover-up" /></p>
                <h1 class="display-2 mb-30">Página no Encontrada</h1>
                <p class="font-lg text-grey-700 mb-30">
                    El enlace en el que hizo clic puede estar roto o la página puede haber sido eliminada.<br />
                    Visite el <a href="{{ url('/') }}"> <span> Inicio</span></a>
                </p>

                <a class="btn btn-default submit-auto-width font-xs hover-up mt-30" href="{{ url('/') }}"><i
                        class="fi-rs-home mr-5"></i> Regresa a la Página de Inicio</a>
            </div>
        </div>
    </div>
</div>




@endsection