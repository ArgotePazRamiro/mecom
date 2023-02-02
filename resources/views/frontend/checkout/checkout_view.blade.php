@extends('frontend.master_dashboard')
@section('main')

@section('title')

Área de Pago

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Inicio</a>
            <span></span> Área de Pago
        </div>
    </div>
</div>
<div class="container mb-80 mt-50">
    <div class="row">
        <div class="col-lg-8 mb-40">
            <h3 class="heading-2 mb-10">Área de Pago</h3>
            <div class="d-flex justify-content-between">
                <h6 class="text-body">Hay productos en tu carrito.</h6>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-7">

            <div class="row">
                <h4 class="mb-30">Detalles de facturación</h4>

                <form method="post" action="{{ route('checkout.store') }}">
                    @csrf

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <input type="text" required="" name="shipping_name" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="form-group col-lg-6">
                            <input type="email" required="" name="shipping_email" value="{{ Auth::user()->email }}">
                        </div>
                    </div>



                    <div class="row shipping_calculator">
                        <div class="form-group col-lg-6">
                            <div class="custom_select">
                                <select name="division_id" class="form-control">
                                    <option value="">Seleccione una Comuna...</option>

                                    @foreach ($divisions as $item)
                                    <option value="{{ $item->id }}">{{ $item->division_name }}</option>
                                    @endforeach


                                </select>
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <input required="" type="text" name="shipping_phone" value="{{ Auth::user()->phone }}">
                        </div>
                    </div>

                    <div class="row shipping_calculator">
                        <div class="form-group col-lg-6">
                            <div class="custom_select">
                                <select name="district_id" class="form-control">



                                </select>
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <input required="" type="text" name="post_code" placeholder="Código Postal *">
                        </div>
                    </div>


                    <div class="row shipping_calculator">
                        <div class="form-group col-lg-6">
                            <div class="custom_select">
                                <select name="state_id" class="form-control">



                                </select>
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <input required="" type="text" name="shipping_address" placeholder="Dirección *"
                                value="{{ Auth::user()->address }}">
                        </div>
                    </div>





                    <div class="form-group mb-30">
                        <textarea rows="5" placeholder="Información Adicional" name="notes"></textarea>
                    </div>




            </div>
        </div>


        <div class="col-lg-5">
            <div class="border p-40 cart-totals ml-30 mb-50">
                <div class="d-flex align-items-end justify-content-between mb-30">
                    <h4>Tu Orden</h4>
                </div>
                <div class="divider-2 mb-30"></div>
                <div class="table-responsive order_table checkout">
                    <table class="table no-border">
                        <tbody>

                            @foreach ($carts as $item)

                            <tr>
                                <td class="image product-thumbnail"><img src="{{ asset($item->options->image) }}"
                                        alt="#" style="width:50px;height:50px"></td>
                                <td>
                                    <h6 class="w-160 mb-5">
                                        <a href="shop-product-full.html" class="text-heading">{{ $item->name }}</a>
                                    </h6></span>
                                    <div class="product-rate-cover">

                                        <strong>Color: {{ $item->options->color }}</strong>
                                        <strong>Tamaño: {{ $item->options->size }}</strong>

                                    </div>
                                </td>
                                <td>
                                    <h6 class="text-muted pl-20 pr-20">x {{ $item->qty }}</h6>
                                </td>
                                <td>
                                    <h4 class="text-brand">{{ $item->price }} Bs.</h4>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>




                    <table class="table no-border">
                        <tbody>

                            @if (Session::has('coupon'))
                            <tr>
                                <td class="cart_total_label">
                                    <h6 class="text-muted">Subtotal</h6>
                                </td>
                                <td class="cart_total_amount">
                                    <h4 class="text-brand text-end">{{ $cartTotal }} Bs.</h4>
                                </td>
                            </tr>

                            <tr>
                                <td class="cart_total_label">
                                    <h6 class="text-muted">Nombre de Cupón</h6>
                                </td>
                                <td class="cart_total_amount">
                                    <h6 class="text-brand text-end">
                                        {{ session()->get('coupon')['coupon_name'] }} ({{
                                        session()->get('coupon')['coupon_discount'] }}%)
                                    </h6>
                                </td>
                            </tr>

                            <tr>
                                <td class="cart_total_label">
                                    <h6 class="text-muted">Descuento de Cupón</h6>
                                </td>
                                <td class="cart_total_amount">
                                    <h4 class="text-brand text-end">
                                        {{ session()->get('coupon')['discount_amount'] }} Bs.
                                    </h4>
                                </td>
                            </tr>

                            <tr>
                                <td class="cart_total_label">
                                    <h6 class="text-muted">Costo Total</h6>
                                </td>
                                <td class="cart_total_amount">
                                    <h4 class="text-brand text-end">
                                        {{ session()->get('coupon')['total_amount'] }} Bs.
                                    </h4>
                                </td>
                            </tr>

                            @else

                            <tr>
                                <td class="cart_total_label">
                                    <h6 class="text-muted">Costo Total</h6>
                                </td>
                                <td class="cart_total_amount">
                                    <h4 class="text-brand text-end">{{ $cartTotal }} Bs.</h4>
                                </td>
                            </tr>

                            @endif


                        </tbody>
                    </table>





                </div>
            </div>
            <div class="payment ml-30">
                <h4 class="mb-30">Pago</h4>
                <div class="payment_option">
                    
                    <div class="custome-radio">

                        <input class="form-check-input" required="" type="radio" name="payment_option" value="cash"
                            id="exampleRadios4" checked="">
                        <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse"
                            data-target="#checkPayment" aria-controls="checkPayment">
                            Pago al Entregar
                        </label>

                    </div>
                    <div class="custome-radio">

                        <input class="form-check-input" required="" type="radio" name="payment_option" value="stripe"
                            id="exampleRadios3" checked="">
                        <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse"
                            data-target="#bankTranfer" aria-controls="bankTranfer">
                            Tarjeta de Débito o Crédito (Stripe)
                        </label>

                    </div>
                </div>
                <div class="payment-logo d-flex">
                    <img class="mr-15" src="{{ asset('frontend/assets/imgs/theme/icons/payment-visa.svg') }}" alt="">
                    <img class="mr-15" src="{{ asset('frontend/assets/imgs/theme/icons/payment-master.svg') }}" alt="">
                </div>
                <button href="#" class="btn btn-fill-out btn-block mt-30">Haga su Pedido<i
                        class="fi-rs-sign-out ml-15"></i></button>
            </div>
        </div>
    </div>
</div>
</form>


<script type="text/javascript">
    //SHOW DISTRITO DATA

    $(document).ready(function(){
        $('select[name="division_id"]').on('change', function(){
            var division_id = $(this).val();
            if (division_id) {
                $.ajax({
                    url: "{{ url('/district-get/ajax') }}/" + division_id,
                    type: "GET",
                    dataType: "json",
                    success:function(data){
                        $('select[name="state_id"]').html('');
                        var d =$('select[name="district_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
                        });
                    },
                });
            } else {
                alert('Debe Elegir un Distrito');
            }
        });
    });

    //SHOW ZONA DATA

    $(document).ready(function(){
        $('select[name="district_id"]').on('change', function(){
            var district_id = $(this).val();
            if (district_id) {
                $.ajax({
                    url: "{{ url('/state-get/ajax') }}/" + district_id,
                    type: "GET",
                    dataType: "json",
                    success:function(data){
                        $('select[name="state_id"]').html('');
                        var d =$('select[name="state_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="state_id"]').append('<option value="'+ value.id +'">' + value.state_name + '</option>');
                        });
                    },
                });
            } else {
                alert('Debe Elegir una Zona');
            }
        });
    });

</script>


@endsection