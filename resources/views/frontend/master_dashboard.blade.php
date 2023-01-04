<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>"EasyBuy" Tienda Online</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/imgs/theme/favicon.svg') }}" />
    <!-- Template CSS --> 
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css?v=5.3') }}" />
</head>

<body>
    <!-- Modal -->
    <!-- Quick view -->
    @include('frontend.body.quickview')

    <!-- Header  -->

    @include('frontend.body.header')

    <!--End header-->

    <main class="main">
        
        @yield('main')

    </main>


    <!--Footer-->
    @include('frontend.body.footer')
    <!--End Footer-->


    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="{{ asset('frontend/assets/imgs/theme/loading.gif') }}" alt="" />
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor JS-->
    <script src="{{ asset('frontend/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.elevatezoom.js') }}"></script>
    <!-- Template JS -->
    <script src="{{ asset('frontend/assets/js/main.js?v=5.3') }}"></script>
    <script src="{{ asset('frontend/assets/js/shop.js?v=5.3') }}"></script>

    {{-- Sweet Alert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        })

        /// Start product Quickview with Modal

        function productView(id) {
            // alert(id)
            $.ajax({
                type: 'GET',
                url: '/product/view/modal/'+id,
                dataType: 'json',
                success:function(data){
                    // console.log(data)
                    $('#pname').text(data.product.product_name);
                    $('#pprice').text(data.product.selling_price);
                    $('#pcode').text(data.product.product_code);
                    $('#pcategory').text(data.product.category.category_name);
                    $('#pbrand').text(data.product.brand.brand_name);

                    $('#pimage').attr('src','/' + data.product.product_thambnail);

                    $('#product_id').val(id);
                    $('#qty').val(1);

                    //Product Price
                    if (data.product.discount_price == null) {
                        $('#pprice').text('');
                        $('#oldprice').text('');
                        $('#pprice').text(data.product.selling_price + ' Bs.');
                    }else{
                        $('#pprice').text(data.product.discount_price + ' Bs.');
                        $('#oldprice').text(data.product.selling_price + ' Bs.');
                    }//end else

                    //Start Stock Option
                    if (data.product.product_qty > 0) {
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#aviable').text('Disponible');
                    }else{
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#stockout').text('Agotado');
                    }
                    //End Stock Option

                    //Size
                    $('select[name="size"]').empty();
                    $.each(data.size, function(key,value){
                        $('select[name="size"]').append('<option value="'+ value +'">'+ value +' </option>')
                        if (data.size == ""){
                            $('#sizeArea').hide();
                        }else{
                            $('#sizeArea').show();
                        }
                    })
                    //End Size

                    //Color
                    $('select[name="color"]').empty();
                    $.each(data.color, function(key,value){
                        $('select[name="color"]').append('<option value="'+ value +'">'+ value +' </option>')
                        if (data.color == ""){
                            $('#colorArea').hide();
                        }else{0
                            $('#colorArea').show();
                        }
                    })
                    //End Color



                }
            })
        }

        //End Product Quickview with Modal

        /// Start Add to Cart Product

        function addToCart(){

            var product_name = $('#pname').text();
            var id = $('#product_id').val();
            var color = $('#color option:selected').text();
            var size = $('#size option:selected').text();
            var quantity = $('#qty').val();
            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    color: color, size:size, quantity:quantity, product_name:product_name
                },
                url: "/cart/data/store/"+ id,
                success:function(data){
                    miniCart();
                    $('#closeModal').click();
                    // console.log(data)

                    //Start Message

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000,
                    })
                    if ($.isEmptyObject(data.error)){
                        Toast.fire({
                        type: 'success',
                        title: data.success,
                        })
                    }else{

                        Toast.fire({
                            type: 'error',
                            title: data.error,
                        })

                    }
                    //End Message   
                }
            })
        }

        /// End Add to Cart Product

        /// Start Details Page Add to Cart Product

        function addToCartDetails(){

            var product_name = $('#dpname').text();
            var id = $('#dproduct_id').val();
            var color = $('#dcolor option:selected').text();
            var size = $('#dsize option:selected').text();
            var quantity = $('#dqty').val();
            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    color: color, size:size, quantity:quantity, product_name:product_name
                },
                url: "/dcart/data/store/"+ id,
                success:function(data){
                    miniCart();
                    // console.log(data)

                    //Start Message

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000,
                    })
                    if ($.isEmptyObject(data.error)){
                        Toast.fire({
                        type: 'success',
                        title: data.success,
                        })
                    }else{

                        Toast.fire({
                            type: 'error',
                            title: data.error,
                        })

                    }
                    //End Message   
                }
            })
        }

        /// End Details Page Add to Cart Product

    </script>

    <script type="text/javascript">

        function miniCart(){
            
            $.ajax({

                type: 'GET',
                url: '/product/mini/cart',
                dataType: 'json',
                success: function(response) {    
                    // console.log(response)

                    $('span[id="cartSubTotal"]').text(response.cartTotal + ' Bs.');
                    $('#cartQty').text(response.cartQty);

                    var miniCart = ""

                    $.each(response.carts, function(key,value){
                        miniCart += `
                        <ul>
                            <li>
                                <div class="shopping-cart-img">
                                    <a href="shop-product-right.html">
                                        <img alt="Nest" src="/${value.options.image} " style="width:50px:height:50px;" />
                                    </a>
                                </div>
                                <div class="shopping-cart-title" style="margin: -73px 104px 14px; width" 146px;>
                                    <h4><a href="shop-product-right.html"> ${value.name} </a></h4>
                                    <h4><span >${value.qty} × </span>${value.price}Bs.</h4>
                                </div>
                                <div class="shopping-cart-delete" style="margin: -85px 1px 0px;">
                                    <a type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fi-rs-cross-small"></i></a>
                                </div>
                            </li>
                        </ul>
                        <hr><br>
                        `
                    });

                    $('#miniCart').html(miniCart);

                }

            })

        }

        miniCart();

        ///Mini Cart Remove Start

        function miniCartRemove(rowId){
            $.ajax({
                type: 'GET',
                url: '/minicart/product/remove/'+rowId,
                dataType: 'json',
                success:function(data) {
                    miniCart();
                    //Start Message

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000,
                    })
                    if ($.isEmptyObject(data.error)){
                        Toast.fire({
                        type: 'success',
                        title: data.success,
                        })
                    }else{

                        Toast.fire({
                            type: 'error',
                            title: data.error,
                        })

                    }
                    //End Message
                }


            })
        }

        ///Mini Cart Remove End


    </script>

    {{-- // Start Wishlist --}}

    <script type="text/javascript">

        function addToWishList(product_id) {
            
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "/add-to-wishlist/" + product_id,

                success:function(data){
                    wishlist();
                    //Start Message

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    })
                    if ($.isEmptyObject(data.error)){
                        Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,
                        })
                    }else{

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })

                    }
                    //End Message
                }

            })

        }

    </script>

    {{-- // End Wishlist --}}

    {{-- // Load Wishlist Data--}}

    <script type="text/javascript">

        function wishlist() {
            
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/get-wishlist-product/",

                success:function(response){
                    $('#wishQty').text(response.wishQty);
                    var rows = ""
                    $.each(response.wishlist, function(key,value) {
                        
                        rows += `

                        <tr class="pt-30">
                            <td class="custome-checkbox pl-30">
                                
                            </td>
                            <td class="image product-thumbnail pt-40"><img src="/${value.product.product_thambnail}" alt="#" /></td>
                            <td class="product-des product-name">
                                <h6><a class="product-name mb-10" href="shop-product-right.html">${value.product.product_name}</a></h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                            </td>
                            <td class="price" data-title="Price">
                                ${value.product.discount_price == null
                                ?`<h3 class="text-brand">${value.product.selling_price} Bs.</h3>`
                                :`<h3 class="text-brand">${value.product.discount_price} Bs.</h3>`
                                }
                            </td>
                            <td class="text-center detail-info" data-title="Stock">
                                ${value.product.product_qty > 0
                                ?`<span class="stock-status in-stock mb-0"> En Stock </span>`
                                :`<span class="stock-status out-stock mb-0"> Agotado </span>`
                                }
                                
                            </td>
                            
                            <td class="action text-center" data-title="Remove">
                                <a type="submit" class="text-body" id="${value.id}" onclick="wishlistRemove(this.id)"><i class="fi-rs-trash"></i></a>
                            </td>
                        </tr>
                        
                        `

                    });

                    $('#wishlist').html(rows);

                }

            })

        }
        wishlist()

        // Wishlist Remove Data

        function wishlistRemove(id) {
            
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/wishlist-remove/" + id,

                success:function(data){
                    wishlist()
                    //Start Message

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    })
                    if ($.isEmptyObject(data.error)){
                        Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,
                        })
                    }else{

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })

                    }
                    //End Message
                }

            })

        }




        // End Wishlist Remove Data


    </script>

    {{-- // End Load Wishlist Data --}}


    {{-- // Start Compare Add --}}

    <script type="text/javascript">

        function addToCompare(product_id) {
            
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "/add-to-compare/" + product_id,

                success:function(data){
                    compare();
                    //Start Message

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    })
                    if ($.isEmptyObject(data.error)){
                        Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,
                        })
                    }else{

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })

                    }
                    //End Message
                }

            })

        }

    </script>

    {{-- // End Compare --}}

    {{-- // Load Compare Data--}}

    <script type="text/javascript">

        function compare() {
            
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/get-compare-product/",

                success:function(response){
                    $('#compareQty').text(response.compareQty);
                    var rows = ""
                    $.each(response.compare, function(key,value) {
                        
                        rows += `

                        <tr class="pr_image">
                            <td class="text-muted font-sm fw-600 font-heading mw-200">Vista Anticipada</td>
                            <td class="row_img"><img src="/${value.product.product_thambnail}" style="width:300px; height:300px;" alt="compare-img" /></td>
                        </tr>
                        <tr class="pr_title">
                            <td class="text-muted font-sm fw-600 font-heading">Nombre</td>
                            <td class="product_name">
                                <h6><a href="shop-product-full.html" class="text-heading">${value.product.product_name}</a></h6>
                            </td>
                        </tr>
                        <tr class="pr_price">
                            <td class="product_price">
                                ${value.product.discount_price == null
                                ?`<h4 class="price text-brand">${value.product.selling_price} Bs.</h4>`
                                :`<h4 class="price text-brand">${value.product.discount_price} Bs.</h4>`
                                }
                            </td>
                        </tr>
                        
                        <tr class="description">
                            <td class="text-muted font-sm fw-600 font-heading">Descripción</td>
                            <td class="row_text font-xs">
                                <p class="font-sm text-muted">${value.product.short_descp}</p>
                            </td>
                        </tr>
                        <tr class="pr_stock">
                            <td class="text-muted font-sm fw-600 font-heading">Inventario</td>
                            
                            <td class="row_stock">
                                ${value.product.product_qty > 0
                                ?`<span class="stock-status in-stock mb-0"> En Stock </span>`
                                :`<span class="stock-status out-stock mb-0"> Agotado </span>`
                                }
                            </td>
                        </tr>
                        
                        <tr class="pr_remove text-muted">
                            <td class="text-muted font-md fw-600"></td>
                            <td class="row_remove">
                                <a type="submit" class="text-muted" id="${value.id}" onclick="compareRemove(this.id)"><i class="fi-rs-trash mr-5"></i><span>Remove</span> </a>
                            </td>
                        </tr>
                        
                        `

                    });

                    $('#compare').html(rows);

                }

            })

        }
        compare()

        // Compare Remove Data

        function compareRemove(id) {
            
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/compare-remove/" + id,

                success:function(data){
                    compare()
                    //Start Message

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    })
                    if ($.isEmptyObject(data.error)){
                        Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,
                        })
                    }else{

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })

                    }
                    //End Message
                }

            })

        }




        // End Compare Remove Data


    </script>

    {{-- // End Load Compare Data --}}


</body>

</html>