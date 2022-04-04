@extends('layouts.app', ['activePage' => 'empresas', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Dashboard', 'activeButton' => 'empresas'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card stacked-form">
                                <div class="card-header ">
                                    <h4 class="card-title">Create Empresa</h4>
                                </div>
                                <div class="card-body ">
                                    <form method="post" action="{{route('empresas.store')}}">
                                        @csrf
                                        <div class="form-group">
                                            <label>Nombre Empresa</label>
                                            <input type="text" placeholder="Nombre Empresa" class="form-control" name="nombre">
                                            @include('alerts.error_self_update', ['key' => 'nombre'])

                                        </div>
                                        <div class="form-group">
                                            <label>Account ID SS</label>
                                            <input type="text" placeholder="Account ID" class="form-control" name="cuenta_id">
                                            @include('alerts.error_self_update', ['key' => 'cuenta_id'])

                                        </div>
                                        <div class="form-group">
                                            <label>Api Key SS</label>
                                            <input type="text" placeholder="Api Key" class="form-control" name="api_key">
                                            @include('alerts.error_self_update', ['key' => 'api_key'])

                                        </div>
                                        <input type="submit" class="btn btn-fill btn-info" value="Crear Empresa">

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

