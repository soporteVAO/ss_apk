@extends('layouts.app', ['activePage' => 'empresas', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Dashboard', 'activeButton' => 'empresas'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card stacked-form">
                                <div class="card-header ">
                                    <div class="row">
                                        <div class="col-8">
                                            <h4 class="card-title">Editar Empresa</h4>
                                        </div>
                                        <div class="col-4">
                                            <a href="{{route('empresas.show',$empresa)}}" class="btn btn-success">Volver</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body ">
                                    <form method="post" action="{{route('empresas.update',$empresa)}}">
                                        @csrf
                                        <div class="form-group">
                                            <label>Nombre Empresa</label>
                                            <input type="text" placeholder="Nombre Empresa" class="form-control" name="nombre" value="{{$empresa->nombre}}">
                                            @include('alerts.error_self_update', ['key' => 'nombre'])

                                        </div>
                                        <div class="form-group">
                                            <label>Account ID SS</label>
                                            <input type="text" placeholder="Account ID" class="form-control" name="cuenta_id" value="{{$empresa->cuenta_id}}">
                                            @include('alerts.error_self_update', ['key' => 'cuenta_id'])

                                        </div>
                                        <div class="form-group">
                                            <label>Api Key SS</label>
                                            <input type="text" placeholder="Api Key" class="form-control" name="api_key" value="{{$empresa->api_key}}">
                                            @include('alerts.error_self_update', ['key' => 'api_key'])

                                        </div>
                                        <input type="submit" class="btn btn-fill btn-info" value="Actualizar">

                                    </form>
                                </div>
                                <!-- <div class="card-footer ">
                                    <button type="submit" class="btn btn-fill btn-info">Submit</button>
                                </div> -->
                            </div>
                </div>
            </div>
        </div>
    </div>
@endsection

