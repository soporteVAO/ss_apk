@extends('layouts.app', ['activePage' => 'guiones', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Dashboard', 'activeButton' => 'empresas'])


@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                <form action="{{route('entrevista.oportunidad',$guion)}}" method="get">  
                    <div class="entrevista-carousel">
                        <div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Introduzca el identificador de la oportunidad</label>
                                        <input type="text" name="opportunity_id" class="form-control">
                                    </div>
                                    <input type="submit" class="btn btn-success" value="Iniciar Entrevista">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

