@extends('layouts.app', ['activePage' => 'guiones', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Dashboard', 'activeButton' => 'empresas'])


@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card-title">Edit Guion</div>
                                    <div class="card-category">Lorem Ipsum</div>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{route('guiones.create')}}" class="btn btn-success">Crear Guión</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('guiones.update', $guion)}}" method="post" id="form">
                                @csrf
                                <div class="form-group">
                                    <label for="">Nombre</label>
                                    <input type="text" value="{{$guion->nombre}}" class="form-control" name="nombre">
                                </div>
                                <div class="draggable-items" id="sortable">
                                    <label for="">Fields Order</label>
                                    @foreach ($guion->getOrderedFields() as $field)
                                        <div class="form-group alert alert-{{$field->category->name}}">
                                            <input class="form-control draggable" name="order[]" value="{{$field->label}}" disabled>
                                            <button type="button" class="btn btn-xs btn-delete"><i class="fa fa-times"></i></button>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- <input type="submit" class="btn btn-success" value="Actualizar Guión"> -->
                                <button type="button" class="btn btn-success send-request">
                                    {{ __('Update Guion') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js" integrity="sha512-zYXldzJsDrNKV+odAwFYiDXV2Cy37cwizT+NkuiPGsa9X1dOz04eHvUWVuxaJ299GvcJT31ug2zO4itXBjFx4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        jQuery(function($){
            $(document).ready(function(){
                sortable = new Sortable(document.getElementById('sortable'));
                $('button[type="button"].send-request').click(()=> {
                    $('#sortable input').each(function (){
                        // console.log($(this));
                        $(this).removeAttr('disabled');
                    });
                    // console.log($(this));
                    $('#form').submit();
                    // this.parentElement.submit()
                });
                
                //script para eliminar preguntas
                $("button.btn-delete").click(function(){
                    // console.log($(this).parent())
                    $(this).parent().remove();
                })
            })
        })
        
    </script>
    <!-- <script>
        const draggables = document.querySelectorAll('.draggable');
        const container = document.querySelectorAll('draggable-items');
        // console.log(draggables);
        draggables.forEach(draggable => {
            // console.log(draggable);
            draggable.addEventListener('dragStart', ()=> {
                console.log('dragStart');
                draggable.classList.add('dragging');
            });
        });
    </script> -->
@endpush