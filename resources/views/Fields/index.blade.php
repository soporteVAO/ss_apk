@extends('layouts.app', ['activePage' => 'fields', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Icons', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
            
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-8">
                                    <div class="card-title">Users</div>
                                    <div class="card-category">Lorem Ipsum</div>
                                </div>
                                <div class="col-4">
                                    Campos de Oportunidad: {{count($fields)}}
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-body table-full-width table-responsive">
                                <table class="table table-hover table-striped" id="table">
                                    <thead>
                                        <th scope="col" class="d-none d-md-block">Id</th>
                                        <th scope="col">Label</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Categoria</th>
                                    </thead>
                                    <tbody>
                                        @if(count($fields)==0)
                                            <div class="alert alert-danger">
                                                Debe sincronizar los datos para visualizar los campos
                                            </div>
                                        @endif
                                        @foreach($fields as $field)
                                            <tr>
                                                <td class="field-id d-none d-md-block">{{$field->id}}</td>
                                                <td>{{$field->label}}</td>
                                                <td>{{$field->dataType}}</td>
                                                <td>{{$field->category->name}}</td>
                                                <td class="d-flex justify-content-end">
                                                    <a href="" class="btn btn-info btn-link btn-xs">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </a>
                                                    <button class="btn btn-info btn-link btn-xs btn-edit" role="button">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <!-- <a class="btn btn-info btn-link btn-xs btn-edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a> -->
                                                    
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
    </div>

    <!-- MODAL -->
    <div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <form action="{{route('fields.update')}}" method="post">
                    @csrf
                    <input type="hidden" value="" name="field_id" class="form-field-id">
                    <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">
                        Seleccione una categoría para el campo
                    </h2>
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                    </header>
                    <main class="modal__content" id="modal-1-content">
                            
                            <div class="form-group">
                                <label for="">Categoria</label>
                                <select name="categoria_id" id="" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        
                        <!-- <p>
                            Try hitting the <code>tab</code> key and notice how the focus stays within the modal itself. Also, <code>esc</code> to close modal.
                        </p> -->
                    </main>
                    <footer class="modal__footer">
                        <input type="submit" class="btn btn-success" value="Actualizar">
                        <!-- <button class="modal__btn modal__btn-primary">Continue</button> -->
                        <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Close</button>
                    </footer>
                </form>
            </div>
        </div>
    </div>
    
@endsection


@push('js')
<script type="text/javascript">
    jQuery(function($){

        $(document).ready(function() {
            $("#table").fancyTable({
            //   sortColumn:0,
              searchable: false,
            //   pagination: true,
            //   perPage:10,
              // globalSearch:true
          });

            $('button.btn-edit').each(function(){
                // console.log($(this));
                $(this).on('click',function(){
                    console.log($(this).parents('tr'));
                    let field_id=$(this).parents('tr').find(".field-id").text();
                    $('input.form-field-id').val(field_id);
                    MicroModal.show('modal-1',{
                        onShow: function(modal) {
                            console.log("micromodal open");
                        }, 
                    }); // [1]
                });
            });
            
        });
    })
            
    </script>
@endpush