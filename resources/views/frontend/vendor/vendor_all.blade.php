@extends('frontend.master_dashboard')
@section('main')

@section('title')

Detalles de Vendedor

@endsection

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Inicio</a>
            <span></span> Lista de Vendedores
        </div>
    </div>
</div>
<div class="page-content pt-50">
    <div class="container">
        <div class="archive-header-2 text-center">
            <h1 class="display-2 mb-50">Lista de Vendedores</h1>
            <div class="row">
                <div class="col-lg-5 mx-auto">
                    <div class="sidebar-widget-2 widget_search mb-50">
 
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-50">
            <div class="col-12 col-lg-8 mx-auto">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        <p>Contamos con <strong class="text-brand">{{ count($vendors) }}</strong> vendedores actualmente.</p>
                    </div>

                </div>
            </div>
        </div>


        
        <div class="row vendor-grid">

            @foreach ($vendors as $vendor)

            <div class="col-lg-3 col-md-6 col-12 col-sm-6">
                <div class="vendor-wrap mb-40">
                    <div class="vendor-img-action-wrap">
                        <div class="vendor-img">
                            <a href="{{ route('vendor.details', $vendor->id) }}">
                                <img class="default-img" src="{{ (!empty($vendor->photo)) ? url('upload/vendor_images/'.$vendor->photo):url('upload/no_image.jpg') }}" style="width:120px;height:120px" alt="" />
                            </a>
                        </div>
                        <div class="product-badges product-badges-position product-badges-mrg">
                            <span class="hot">Verificado</span>
                        </div>
                    </div>
                    <div class="vendor-content-wrap">
                        <div class="d-flex justify-content-between align-items-end mb-30">
                            <div>
                                <div class="product-category">
                                    <span class="text-muted">Desde {{ $vendor->vendor_join }}</span>
                                </div>
                                <h4 class="mb-5"><a href="{{ route('vendor.details', $vendor->id) }}">{{ $vendor->name }}</a></h4>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                            </div>
                            @php
                            
                            $products = App\Models\Product::where('vendor_id', $vendor->id)->get();
                            
                            @endphp
                            <div class="mb-10">
                                <span class="font-small total-product">{{ count($products) }} productos</span>
                            </div>
                        </div>
                        <div class="vendor-info mb-30">
                            <ul class="contact-infor text-muted">
                                <li>
                                    <img src="assets/imgs/theme/icons/icon-location.svg" alt="" />
                                    <strong>Dirección: </strong><span>{{ $vendor->address }}</span>
                                </li>
                                <li>
                                    <img src="assets/imgs/theme/icons/icon-contact.svg" alt="" />
                                    <strong>Contáctanos:</strong><span>{{ $vendor->phone }}</span>
                                </li>
                            </ul>
                        </div>
                        <a href="{{ route('vendor.details', $vendor->id) }}" class="btn btn-xs">Visitar<i class="fi-rs-arrow-small-right"></i></a>
                    </div>
                </div>
            </div>
            <!--end vendor card-->

            @endforeach

        </div>
        
    </div>
</div>



@endsection