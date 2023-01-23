@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Editar Administrador</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Administrador</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">

        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">
                
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">

                            <form id="myForm" method="post" action="{{ route('admin.user.update', $user->id) }}">
                                @csrf

                                <div class="form-group mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nombre de Usuario:</h6>
                                    </div>
                                    <br>
                                    <div class="col-sm-12 text-secondary">
                                        <input type="text" class="form-control" name="username" value="{{ $user->username }}"/>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nombre Completo:</h6>
                                    </div>
                                    <br>
                                    <div class="col-sm-12 text-secondary">
                                        <input type="text" name="name" class="form-control" value="{{ $user->name }}"/>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email:</h6>
                                    </div>
                                    <br>
                                    <div class="col-sm-12 text-secondary">
                                        <input type="email" name="email" class="form-control" value="{{ $user->email  }}"/>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Teléfono:</h6>
                                    </div>
                                    <br>
                                    <div class="col-sm-12 text-secondary">
                                        <input type="text" name="phone" class="form-control" value="{{ $user->phone }}"/>
                                    </div>
                                </div>


                                <div class="form-group mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Dirección:</h6>
                                    </div>
                                    <br>
                                    <div class="col-sm-12 text-secondary">
                                        <input type="text" name="address" class="form-control" value="{{ $user->address }}"/>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Asignar Rol:</h6>
                                    </div>
                                    <br>
                                    <div class="col-sm-9 text-secondary">
                                        <select name="roles" class="form-select mb-3" aria-label="Default select example">

                                            <option selected="">Escoja una Opción</option>

                                            @foreach ($roles as $role)

                                                <option value="{{ $role->id }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>

                                            @endforeach
   
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4" value="Actualizar" />
                                    </div>
                                </div>
                        </div>

                        </form>




                    </div>




                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                username:{
                    required: true,
                },
                name:{
                    required: true,
                },
                email:{
                    required: true,
                },
                phone:{
                    required: true,
                },
                address:{
                    required: true,
                },
            },
            messages: {
                username:{
                    required: 'Por favor Ingrese el nombre de Usuario',
                },
                name:{
                    required: 'Por favor Ingrese el nombre completo',
                },
                email:{
                    required: 'Por favor Ingrese el Email',
                },
                phone:{
                    required: 'Por favor Ingrese el Teléfono',
                },
                address:{
                    required: 'Por favor Ingrese la Dirección',
                },
            },
            errorElement: 'span',
            errorPlacement: function (error, element){
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
            
        });
    });

</script>


@endsection