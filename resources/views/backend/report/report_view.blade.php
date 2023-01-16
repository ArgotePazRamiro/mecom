@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Informe de Comercio Electrónico</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Informe de Comercio Electrónico</li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->

    <hr />

    <div class="row row-cols-1 row-cols-md-1 row-cols-lg-3 row-cols-xl-3">

        <form method="POST" action="{{ route('search-by-date') }}">

            @csrf
        
            <div class="col">
                <div class="card">
                    
                    <div class="card-body">
                        <h5 class="card-title">Buscar por Fecha</h5>

                        <label class="form-label ">Fecha:</label>

                        <input type="date" name="date" class="form-control">
                        <br>
                        <input type="submit" class="btn btn-rounded btn-primary" value="Buscar">
                        
                    </div>
                    
                </div>
            </div>

        </form>

        <form method="POST" action="{{ route('search-by-month') }}">

            @csrf
        
            <div class="col">
                <div class="card">
                    
                    <div class="card-body">
                        <h5 class="card-title">Buscar por Mes</h5>

                        <label class="form-label ">Seleccionar Mes:</label>

                        <select name="month" class="form-select mb-3" aria-label="Default select example">
                            <option selected="">Escoja un Mes</option>
                            <option value="January">Enero</option>
                            <option value="February">Febrero</option>
                            <option value="March">Marzo</option>
                            <option value="April">Abril</option>
                            <option value="May">Mayo</option>
                            <option value="June">Junio</option>
                            <option value="July">Julio</option>
                            <option value="August">Agosto</option>
                            <option value="September">Septiembre</option>
                            <option value="October">Octubre</option>
                            <option value="November">Noviembre</option>
                            <option value="December">Diciembre</option>
                        </select>

                        <label class="form-label ">Seleccionar Año:</label>

                        <select name="year_name" class="form-select mb-3" aria-label="Default select example">
                            <option selected="">Escoja un Año</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                        </select>
                        <br>
                        <input type="submit" class="btn btn-rounded btn-primary" value="Buscar">
                        
                    </div>
                    
                </div>
            </div>

        </form>

        <form method="POST" action="{{ route('search-by-year') }}">

            @csrf
        
            <div class="col">
                <div class="card">
                    
                    <div class="card-body">
                        <h5 class="card-title">Buscar por Año</h5>

                        <label class="form-label ">Seleccionar Año:</label>

                        <select name="year" class="form-select mb-3" aria-label="Default select example">
                            <option selected="">Escoja un Año</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                        </select>
                        <br>
                        <input type="submit" class="btn btn-rounded btn-primary" value="Buscar">
                        
                    </div>
                    
                </div>
            </div>

        </form>

    </div>



</div>


@endsection