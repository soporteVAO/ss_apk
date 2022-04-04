@extends('layouts.app', ['activePage' => 'accounts', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Dashboard', 'activeButton' => 'empresas'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-8">
                                    <div class="card-title">Cuentas</div>
                                    <div class="card-category">Lorem Ipsum</div>
                                </div>
                                <div class="col-4">
                                    <a href="" class="btn btn-success disabled" disabled>Crear Cuenta</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped table-sortable" id="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Propietario</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($accounts as $account)
                                        <tr>
                                            <td>{{$account->id}}</td>
                                            <td>{{$account->accountName}}</td>
                                            <td>{{$account->ownerID}}</td>
                                            <td class="d-flex justify-content-end">
                                                <a href="{{route('account.show', $account->id)}}" class="btn btn-info btn-link btn-xs">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="{{route('empresas.edit',$account->id)}}" class="btn btn-info btn-link btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{route('empresas.destroy',$account->id)}}" class="btn btn-info btn-link btn-xs">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </td>
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
@endsection