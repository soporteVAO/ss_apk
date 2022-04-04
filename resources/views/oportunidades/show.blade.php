@extends('layouts.app', ['activePage' => 'oportunidades', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Dashboard', 'activeButton' => 'oportunidades'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            @include('alerts.success')

            <div class="row" >
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">{{$oportunidad['opportunityName']}}</div>
                            <div class="card-category">Editar Oportunidad</div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('oportunidades.update')}}" method='post'>
                                @csrf
                                @method('post')
                                <div class="row">
                                    <!-- {{var_dump($oportunidad)}} -->
                                @foreach ($fields as $field)
                                    @if (array_key_exists($field->systemName,$oportunidad))
                                        <div class="col-md-4">
                                            <!-- Clave: {{$field->label}} <br>-->
                                            <!-- Valor: {{$oportunidad[$field->systemName]}} <br>  -->
                                            <!-- Tipo: {{$field->dataType}} <br> -->
                                            <x-Forms.input :field="$field" :value="$oportunidad[$field->systemName]"/>
                                        </div>
                                    @endif
                                @endforeach
                                </div>
                                <input type="hidden" name="id" value="{{$oportunidad['id']}}">
                                <input type="submit" value="Actualizar Oportunidad" class="btn btn-success" style="">
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection