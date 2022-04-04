@extends('layouts.app', ['activePage' => 'guiones', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Dashboard', 'activeButton' => 'empresas'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('alerts.success')
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card-title">Guiones</div>
                                    <div class="card-category">Lorem Ipsum</div>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{route('guiones.create')}}" class="btn btn-success">Crear Guión</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped table-sortable" id="table">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>created_at</th>
                                        <th></th>
                                        <!-- <th>Actions</th> -->
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                    @foreach($guiones as $guion)
                                        <tr>
                                            <td>{{$guion->nombre}}</td>
                                            <td>{{$guion->created_at}}</td>
                                            <td><a href="{{route('startEntrevista',$guion)}}" class="btn btn-success"><i class="fa-solid fa-circle-play"></i></a></td>
                                            <td class="text-right">
                                                <a href="{{route('guiones.show',$guion)}}" class="btn btn-info btn-link btn-xs">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="{{route('guiones.edit',$guion)}}" class="btn btn-info btn-link btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="" class="btn btn-info btn-link btn-xs btn-delete" id="form-{{$guion->id}}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                                <form action="{{route('guiones.destroy',$guion)}}" method="POST" id="delete-form-{{$guion->id}}">
                                                    @method('delete')
                                                    @csrf
                                                </form>
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

@push('js')
<script>
    jQuery(function($){
        $(document).ready(function(){
            $("#table").fancyTable({
              sortColumn:0,
              searchable: false,
            //   pagination: true,
            //   perPage:10,
              globalSearch:true
          });
          $('.btn-delete').click(showDeleteMessage);

        });
        function showDeleteMessage(event){
            event.preventDefault();
            // console.log($(this).attr('id'));
            guion = $(this).attr('id');
            Swal.fire({
                title: '¿Estás seguro?',
                // text:'No podrás revertir esto',
                html: "<p>Estas a punto de eliminar todo lo relacionado con el usuario</p><span class='font-weight-bold'>¡No podrás revertir esto!</span>",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Si, eliminalo!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Swal.fire(
                    //     'Deleted!',
                    //     'Your file has been deleted.',
                    //     'success'
                    // )
                    // console.log()
                    $('#delete-'+guion).submit();
                }
            })
        }
    })
    
</script>
@endpush