@extends('frontend.master_dashboard')
@section('main')

@section('title')

    Categoría {{ $breadcat->category_name }}

@endsection

<div class="page-header mt-30 mb-50">
    <div class="container">
        <div class="archive-header">
            <div class="row align-items-center">
                <div class="col-xl-3">
                    <h5 class="mb-15">{{ $breadcat->category_name }}</h5>
                    <div class="breadcrumb">
                        <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Inicio</a>
                        <span></span> {{ $breadcat->category_name }}
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>
<div class="container mb-30">
    <div class="row flex-row-reverse">
        <div class="col-lg-4-5">
            <div class="shop-product-fillter">
                <div class="totall-product">
                    <p>Se encontraron <strong class="text-brand">{{ count($products) }}</strong> artículos para tí!</p>
                </div>
                
            </div>
            <div class="row product-grid">

                @foreach ($products as $product)
                        
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}">

                                        <img class="default-img" src="{{ asset($product->product_thambnail) }}" alt="" />
                                        
                                    </a>
                                </div>
                                <div class="product-action-1">

                                    <a aria-label="Agrega a Lista de Deseos" class="action-btn" id="{{ $product->id }}" onclick="addToWishList(this.id)"><i class="fi-rs-heart"></i></a>

                                    <a aria-label="Comparar" class="action-btn" id="{{ $product->id }}" onclick="addToCompare(this.id)"><i class="fi-rs-shuffle"></i></a>
                                    
                                    <a aria-label="Vista Rápida" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal" id="{{ $product->id }}" onclick="productView(this.id)"><i class="fi-rs-eye"></i></a>

                                </div>

                                @php
                                    $amount = $product->selling_price - $product->discount_price;
                                    $discount = ($amount/$product->selling_price) * 100;
                                @endphp

                                <div class="product-badges product-badges-position product-badges-mrg">

                                    @if ($product->discount_price == NULL)
                                    <span class="new">Nuevo </span>  
                                    @else
                                    <span class="hot">{{ round($discount) }} %</span>  
                                    @endif      

                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="#">{{ $product['category']['category_name'] }}</a>
                                </div>
                                <h2><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}">{{ $product->product_name }}</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>

                                    @if ($product->vendor_id == NULL)
                                    <span class="font-small text-muted">Por Administración</span>
                                    @else
                                    <span class="font-small text-muted">Por <a href="vendor-details-1.html">{{ $product['vendor']['name'] }}</a></span>
                                    @endif
                                    
                                </div>
                                <div class="product-card-bottom">

                                    @if ($product->discount_price == NULL)

                                    <div class="product-price">
                                        <span>{{ $product->selling_price }} Bs.</span>
                                    </div>

                                    @else

                                    <div class="product-price">
                                        <span>{{ $product->discount_price }} Bs.</span><br/>
                                        <span class="old-price">{{ $product->selling_price }} Bs.</span>
                                    </div>

                                    @endif
                                    
                                    <div class="add-cart">
                                        <a class="add" href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}"><i class="fi-rs-shopping-cart mr-5"></i>Detalles</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End product card-->

                    @endforeach

            </div>
            <!--product grid-->
            
            
            <!--End Deals-->
           
        </div>

        <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
            <div class="sidebar-widget widget-category-2 mb-30">
                <h5 class="section-title style-1 mb-30">Categorías</h5>
                <ul>

                    @foreach ($categories as $category)
                    @php
                        
                    $products = App\Models\Product::where('category_id', $category->id)->get();

                    @endphp
                    <li>
                        <a href="{{ url('product/category/'.$category->id.'/'.$category->category_slug) }}"> 
                            <img src="{{ asset($category->category_image) }}" alt="" />{{ $category->category_name }}
                        </a><span class="count">{{ count($products) }}</span>
                    </li>
                    @endforeach

                </ul>
            </div>

            

            <!-- Product sidebar Widget -->

            <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                <h5 class="section-title style-1 mb-30">Nuevos Productos</h5>

                @foreach ($newProduct as $product)
                <div class="single-post clearfix">
                    <div class="image">
                        <img src="{{ asset($product->product_thambnail) }}" alt="#" />
                    </div>
                    <div class="content pt-10">
                        <p><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}">{{ $product->product_name }}</a></p>

                        @if ($product->discount_price == NULL)
                        <p class="price mb-0 mt-5">Bs. {{ $product->selling_price }}</p>
                        @else
                        <p class="price mb-0 mt-5">Bs. {{ $product->discount_price }}</p>
                        @endif
                        
                        <div class="product-rate">
                            <div class="product-rating" style="width: 90%"></div>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
</div>




@endsection