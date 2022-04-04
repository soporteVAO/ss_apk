@extends('layouts.app', ['activePage' => 'guiones', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Dashboard', 'activeButton' => 'empresas'])



@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <form action="{{route('oportunidades.update')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$oportunidad_id}}">
                                <div class="entrevista-carousel">
                                {{var_dump($guion->fields)}}
                                    @foreach($guion->getOrderedFields() as $field)
                                        <div>
                                            <div class="card {{$field->category->name}} mx-3">
                                                <div class="card-body">
                                                    <x-Forms.input :field="$field"/>
                                                
                                                    <div class="slider-buttons">
                                                        <button type="button" class="btn btn-success ml-auto prev-slide">Prev</button>
                                                        <button type="button" class="btn btn-success ml-auto next-slide @if($loop->last) d-none @endif">Next</button>
                                                        @if($loop->last)
                                                            <input type="submit" class="btn btn-success" value="Actualizar Datos">
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    @endforeach
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        jQuery(function($){
            $('.entrevista-carousel').slick({
                'arrows': true,
                'infinite':false,
                'nextArrow':$('.entrevista-carousel button.btn.next-slide'),
                'prevArrow': $('.entrevista-carousel button.btn.prev-slide')
            });
        })
        
        // $('.entrevista-carousel button.btn.next-slide').slick('nextSlide');
    </script>
@endpush