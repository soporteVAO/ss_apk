@extends('layouts.app', ['activePage' => 'guiones', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Dashboard', 'activeButton' => 'empresas'])

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection