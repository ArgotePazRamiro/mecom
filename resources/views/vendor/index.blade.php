@extends('vendor.vendor_dashboard')
@section('vendor')

@php
    
    $id = Auth::user()->id;
    $vendorId = App\Models\User::find($id);
    $status = $vendorId->status;

@endphp

<div class="page-content">

    @if ($status === 'active')

    <h4>Cuenta de Vendedor <span class="text-success">Activa</span></h4>
    @else
    <h4>Cuenta de Vendedor <span class="text-danger">Inactiva</span></h4>
    <p class="text-danger "><b>Por favor espere que el administrador revise su solicitud y apruebe su cuenta</b></p>

    @endif

    
    <!--end row-->

</div>

@endsection