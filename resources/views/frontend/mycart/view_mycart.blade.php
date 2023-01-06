@extends('frontend.master_dashboard')
@section('main')

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Inicio</a>
            <span></span> Carrito de Compras
        </div>
    </div>
</div>
<div class="container mb-80 mt-50">
    <div class="row">
        <div class="col-lg-8 mb-40">
            <h4 class="heading-2 mb-10">Tu Carrito</h4>
            <div class="d-flex justify-content-between">
                <h6 class="text-body">Esta es la lista de productos en tu carrito.</h6>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive shopping-summery">
                <table class="table table-wishlist">

                    <thead>
                        <tr class="main-heading">
                            <th class="custome-checkbox start pl-30">
                                
                            </th>
                            <th scope="col" colspan="2">Producto</th>
                            <th scope="col">Precio Unitario</th>
                            <th scope="col">Color</th>
                            <th scope="col">Tamaño</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col" class="end">Eliminar</th>
                        </tr>
                    </thead>

                    <tbody id="cartPage">
                        
                        
                        


                    </tbody>
                </table>
            </div>
           

            <div class="row mt-50">

                <div class="col-lg-5">

                @if (Session::has('coupon'))

                @else
                    
                
                    <div class="p-40" id="couponField">
                        <h4 class="mb-10">Aplicar Cupón</h4>
                        <p class="mb-30"><span class="font-lg text-muted">Usando un código de promoción?</p>
                        <form action="#">

                            <div class="d-flex justify-content-between">

                                <input class="font-medium mr-15 coupon" id="coupon_name" placeholder="Ingresa TÚ Cupón">

                                <a type="submit" onclick="applyCoupon()" class="btn btn-success">
                                    <i class="fi-rs-label mr-10"></i>
                                    Aplicar
                                </a>

                            </div>

                        </form>
                    </div>
                
                @endif

                </div>


                <div class="col-lg-7">
                     <div class="divider-2 mb-30"></div>
             
                    <div class="border p-md-4 cart-totals ml-30">

                        <div class="table-responsive">
                            <table class="table no-border">
                                <tbody id="couponCalField">

                                    

                                </tbody>
                            </table>
                        </div>
                        <a href="#" class="btn mb-20 w-100">Proceed To CheckOut<i class="fi-rs-sign-out ml-15"></i></a>
                    </div>
                </div>


            
            </div>
        </div>
         
    </div>
</div>



@endsection