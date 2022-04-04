@extends('layouts.app', ['activePage' => 'guiones', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Dashboard', 'activeButton' => 'empresas'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-8">
                                    <div class="card-title">Guiones</div>
                                    <div class="card-category">Lorem Ipsum</div>
                                </div>
                                <div class="col-4">
                                    <a href="" class="btn btn-success">Volver</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5 pr-1">
                                    <label for="">Nombre Guión</label>
                                    <p>{{$guion->nombre}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Preguntas Guión</label>
                                    <table class="table table-hover table-striped table-sortable">
                                        <thead>
                                            <tr>
                                                <th>Label</th>
                                                <th>Order</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($guion->fields as $field)
                                                <tr>
                                                    <td>{{$field->label}}</td>
                                                    <td>{{$field->order}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection