@extends('frontend.master_dashboard')
@section('main')

@section('title')

    EasyBuy Tienda Online

@endsection

<!--Hero slider-->

@include('frontend.home.home_slider')



<!--Features Category slider-->

@include('frontend.home.home_features_category')



<!--Banners-->

@include('frontend.home.home_banner')




<!--New Products-->

@include('frontend.home.home_new_product')



<!--Featured Product-->

@include('frontend.home.home_features_product')



<!-- Teclado Category -->

<section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3>Categoría {{ $skip_category_0->category_name }}</h3>
           
        </div>
        <!--End nav-tabs-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">


                    @foreach ($skip_product_0 as $product)
                        
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
                                    <a href="shop-grid-right.html">{{ $product['category']['category_name'] }}</a>
                                </div>
                                
                                <h2><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}">{{ $product->product_name }}</a></h2>
                                
                                <div class="product-rate-cover">

                                    @php

                                    $reviewcount = App\Models\Review::where('product_id', $product->id)->where('status', 1)->latest()->get();

                                    $average = App\Models\Review::where('product_id', $product->id)->where('status', 1)->avg('rating');
                                            
                                    @endphp

                                    <div class="product-rate d-inline-block">                        

                                        @if ($average == 0)
                                        
                                        @elseif ($average == 1 || $average < 2)
                                        <div class="product-rating" style="width: 20%"></div>
                                        @elseif ($average == 2 || $average < 3)
                                        <div class="product-rating" style="width: 40%"></div>
                                        @elseif ($average == 3 || $average < 4)
                                        <div class="product-rating" style="width: 60%"></div>
                                        @elseif ($average == 4 || $average < 5)
                                        <div class="product-rating" style="width: 80%"></div>
                                        @elseif ($average == 5)
                                        <div class="product-rating" style="width: 100%"></div>
                                        @endif
 
                                    </div>
                                    <span class="font-small ml-5 text-muted">({{ count($reviewcount) }} reseñas)</span>
                                    
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
                                        <span>{{ $product->discount_price }} Bs.</span>
                                        <span class="old-price">{{ $product->selling_price }} Bs.</span>
                                    </div>

                                    @endif
                                    
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End product card-->

                    @endforeach
                   
                </div>
                <!--End product-grid-4-->
            </div>
           
           
        </div>
        <!--End tab-content-->
    </div>


</section>

<!--End Teclado Category -->





<!-- Tarjeta Gráfica Category -->

<section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3>Categoría {{ $skip_category_2->category_name }}</h3>
           
        </div>
        <!--End nav-tabs-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">


                    @foreach ($skip_product_2 as $product)
                        
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
                                    <a href="shop-grid-right.html">{{ $product['category']['category_name'] }}</a>
                                </div>
                                <h2><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}">{{ $product->product_name }}</a></h2>
                                
                                <div class="product-rate-cover">

                                    @php

                                    $reviewcount = App\Models\Review::where('product_id', $product->id)->where('status', 1)->latest()->get();

                                    $average = App\Models\Review::where('product_id', $product->id)->where('status', 1)->avg('rating');
                                            
                                    @endphp

                                    <div class="product-rate d-inline-block">                        

                                        @if ($average == 0)
                                        
                                        @elseif ($average == 1 || $average < 2)
                                        <div class="product-rating" style="width: 20%"></div>
                                        @elseif ($average == 2 || $average < 3)
                                        <div class="product-rating" style="width: 40%"></div>
                                        @elseif ($average == 3 || $average < 4)
                                        <div class="product-rating" style="width: 60%"></div>
                                        @elseif ($average == 4 || $average < 5)
                                        <div class="product-rating" style="width: 80%"></div>
                                        @elseif ($average == 5)
                                        <div class="product-rating" style="width: 100%"></div>
                                        @endif
 
                                    </div>
                                    <span class="font-small ml-5 text-muted">({{ count($reviewcount) }} reseñas)</span>

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
                                        <span>{{ $product->discount_price }} Bs.</span>
                                        <span class="old-price">{{ $product->selling_price }} Bs.</span>
                                    </div>

                                    @endif
                                    
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End product card-->

                    @endforeach
                   
                </div>
                <!--End product-grid-4-->
            </div>
           
           
        </div>
        <!--End tab-content-->
    </div>


</section>

<!--End Tarjeta Gráfica Category -->








<!-- Refrigeraciones Category -->

<section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3>Categoría {{ $skip_category_8->category_name }}</h3>
           
        </div>
        <!--End nav-tabs-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">


                    @foreach ($skip_product_8 as $product)
                        
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
                                    <a href="shop-grid-right.html">{{ $product['category']['category_name'] }}</a>
                                </div>
                                <h2><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}">{{ $product->product_name }}</a></h2>
                                
                                <div class="product-rate-cover">

                                    @php

                                    $reviewcount = App\Models\Review::where('product_id', $product->id)->where('status', 1)->latest()->get();

                                    $average = App\Models\Review::where('product_id', $product->id)->where('status', 1)->avg('rating');
                                            
                                    @endphp

                                    <div class="product-rate d-inline-block">                        

                                        @if ($average == 0)
                                        
                                        @elseif ($average == 1 || $average < 2)
                                        <div class="product-rating" style="width: 20%"></div>
                                        @elseif ($average == 2 || $average < 3)
                                        <div class="product-rating" style="width: 40%"></div>
                                        @elseif ($average == 3 || $average < 4)
                                        <div class="product-rating" style="width: 60%"></div>
                                        @elseif ($average == 4 || $average < 5)
                                        <div class="product-rating" style="width: 80%"></div>
                                        @elseif ($average == 5)
                                        <div class="product-rating" style="width: 100%"></div>
                                        @endif
 
                                    </div>
                                    <span class="font-small ml-5 text-muted">({{ count($reviewcount) }} reseñas)</span>

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
                                        <span>{{ $product->discount_price }} Bs.</span>
                                        <span class="old-price">{{ $product->selling_price }} Bs.</span>
                                    </div>

                                    @endif
                                    
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End product card-->

                    @endforeach
                   
                </div>
                <!--End product-grid-4-->
            </div>
           
           
        </div>
        <!--End tab-content-->
    </div>


</section>

<!--End Refrigeraciones Category -->











<section class="section-padding mb-30">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                <h4 class="section-title style-1 mb-30 animated animated"> Ofertas Calientes </h4>
                <div class="product-list-small animated animated">

                    @foreach ($hot_deals as $item)
                        
                    <article class="row align-items-center hover-up">
                        <figure class="col-md-4 mb-0">
                            <a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug) }}">
                                <img src="{{ asset( $item->product_thambnail ) }}" alt="" />
                            </a>
                        </figure>
                        <div class="col-md-8 mb-0">
                            <h6>
                                <a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug) }}">{{ $item->product_name }}</a>
                            </h6>

                            <div class="product-rate-cover">
                                
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>

                            </div>

                            @if ($item->discount_price == NULL)
                            
                            <div class="product-price">
                                <span>{{ $item->selling_price }} Bs.</span>
                            </div>
                            
                            @else
                            
                            <div class="product-price">
                                <span>{{ $item->discount_price }} Bs.</span>
                                <span class="old-price">{{ $item->selling_price }} Bs.</span>
                            </div>
                            
                            @endif
                        </div>
                    </article>

                    @endforeach

                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                <h4 class="section-title style-1 mb-30 animated animated">  Oferta Especial </h4>
                <div class="product-list-small animated animated">


                    @foreach ($special_offer as $item)
                        
                    <article class="row align-items-center hover-up">
                        <figure class="col-md-4 mb-0">
                            <a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug) }}">
                                <img src="{{ asset( $item->product_thambnail ) }}" alt="" />
                            </a>
                        </figure>
                        <div class="col-md-8 mb-0">
                            <h6>
                                <a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug) }}">{{ $item->product_name }}</a>
                            </h6>
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div>

                            @if ($item->discount_price == NULL)
                            
                            <div class="product-price">
                                <span>{{ $item->selling_price }} Bs.</span>
                            </div>
                            
                            @else
                            
                            <div class="product-price">
                                <span>{{ $item->discount_price }} Bs.</span>
                                <span class="old-price">{{ $item->selling_price }} Bs.</span>
                            </div>
                            
                            @endif
                        </div>
                    </article>

                    @endforeach


                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                <h4 class="section-title style-1 mb-30 animated animated">Recién Agregados</h4>
                <div class="product-list-small animated animated">

                    @foreach ($new as $item)
                        
                    <article class="row align-items-center hover-up">
                        <figure class="col-md-4 mb-0">
                            <a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug) }}">
                                <img src="{{ asset( $item->product_thambnail ) }}" alt="" />
                            </a>
                        </figure>
                        <div class="col-md-8 mb-0">
                            <h6>
                                <a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug) }}">{{ $item->product_name }}</a>
                            </h6>
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div>

                            @if ($item->discount_price == NULL)
                            
                            <div class="product-price">
                                <span>{{ $item->selling_price }} Bs.</span>
                            </div>
                            
                            @else
                            
                            <div class="product-price">
                                <span>{{ $item->discount_price }} Bs.</span>
                                <span class="old-price">{{ $item->selling_price }} Bs.</span>
                            </div>
                            
                            @endif
                        </div>
                    </article>

                    @endforeach
                    
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                <h4 class="section-title style-1 mb-30 animated animated"> Trato Especial </h4>
                <div class="product-list-small animated animated">


                    @foreach ($special_deals as $item)
                        
                    <article class="row align-items-center hover-up">
                        <figure class="col-md-4 mb-0">
                            <a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug) }}">
                                <img src="{{ asset( $item->product_thambnail ) }}" alt="" />
                            </a>
                        </figure>
                        <div class="col-md-8 mb-0">
                            <h6>
                                <a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug) }}">{{ $item->product_name }}</a>
                            </h6>
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div>

                            @if ($item->discount_price == NULL)
                            
                            <div class="product-price">
                                <span>{{ $item->selling_price }} Bs.</span>
                            </div>
                            
                            @else
                            
                            <div class="product-price">
                                <span>{{ $item->discount_price }} Bs.</span>
                                <span class="old-price">{{ $item->selling_price }} Bs.</span>
                            </div>
                            
                            @endif
                        </div>
                    </article>

                    @endforeach


                </div>
            </div>
        </div>
    </div>
</section>
<!--End 4 columns-->


<!--Vendor List -->

@include('frontend.home.home_vendor_list')

<!--End Vendor List -->

@endsection