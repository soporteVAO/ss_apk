@extends('layouts.app', ['activePage' => 'guiones', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Dashboard', 'activeButton' => 'empresas'])

@push('css')
<style>
    .tab-footer{
        padding: 15px 15px 10px 15px;
        background-color: transparent;
        line-height: 30px;
        border-top: none !important;
        font-size: 14px;
    }
</style>
@endpush
@section('content')
            <div class="content">
                <div class="container-fluid">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8 ml-auto mr-auto">
                                <form id="wizardForm" method="post" action="{{route('guiones.store')}}" novalidate="novalidate">
                                    @csrf
                                    @method('post')
                                    <div class="card card-wizard">
                                        <div class="card-header ">
                                            <h3 class="card-title text-center">Awesome Wizard</h3>
                                            <p class="card-category text-center">Split a complicated flow in multiple steps</p>
                                        </div>
                                        <div class="card-body ">
                                            <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="inicio-tab" data-bs-toggle="tab" data-bs-target="#inicio" type="button" role="tab" aria-controls="inicio" aria-selected="true">Inicio</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Preguntas</button>
                                                </li>
                                                <!-- <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Final</button>
                                                </li> -->
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="inicio" role="tabpanel" aria-labelledby="inicio-tab">
                                                    <p class="text-center">Introduce el nombre de la entrevista</p>
                                                    <div class="form-group">
                                                        <label for="">Nombre Entrevista</label>
                                                        <input type="text" class="form-control" name="nombre">
                                                        @include('alerts.feedback', ['field' => 'nombre'])

                                                    </div>

                                                    <div class="tab-footer">
                                                        <button type="button" class="btn btn-info btn-wd btn-next pull-right">Next</button>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                    <x-fields-tabs :categories="$categories"></x-fields-tabs>
                                                    <div class="tab-footer">
                                                        <input type="submit" class="btn btn-success pull-right btn-wd" value="Crear Guión">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                            
                                        </div>
                                        <!-- <div class="card-footer text-center">
                                            <button type="submit" class="btn btn-info btn-wd btn-next pull-right" style="d-none">Crear Formulario</button>                                            
                                            <button type="button" class="btn btn-info btn-wd btn-next pull-right">Next</button>
                                            <div class="clearfix"></div>
                                        </div> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@push('js')
<script>
    jQuery(function($){
        $(document).ready(function(){

            $('.btn-next').click(function(){
                $('.nav-link.active').parent().next('li').find('button').trigger('click');
            });
            $('.btn-back').click(function(){
                $('.nav-link.active').parent().prev('li').find('button').trigger('click');
            });
        }); 
    })
    
</script>
@endpush