@extends('layouts.app', ['activePage' => 'empresas', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Dashboard', 'activeButton' => 'empresas'])

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
                                    <div class="card-title">Administrador de Empresas</div>
                                    <div class="card-category">Lorem Ipsum</div>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{route('empresas.create')}}" class="btn btn-success">Crear Empresa</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped table-sortable" id="table">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>created_at</th>
                                        <!-- <th>Actions</th> -->
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                    @foreach($empresas as $empresa)
                                        <tr>
                                            <td> <a href="{{route('empresas.show',$empresa)}}">{{$empresa->nombre}}</a></td>
                                            <td>{{$empresa->created_at}}</td>
                                            <td class="d-flex justify-content-end">
                                                <a href="{{route('empresas.show', $empresa)}}" class="btn btn-info btn-link btn-xs">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="{{route('empresas.edit',$empresa)}}" class="btn btn-info btn-link btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="" class="btn btn-info btn-link btn-xs btn-delete" id="empresa-{{$empresa->id}}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                                <form action="{{route('empresas.destroy',$empresa)}}" method="POST" id="delete-empresa-{{$empresa->id}}">
                                                    @method('delete')
                                                    @csrf
                                                </form>
                                            </td>
                                            <!-- <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <a href="{{route('empresas.edit',$empresa)}}" class="dropdown-item">Edit</a>
                                                        <form action="{{route('empresas.destroy',$empresa)}}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Seguro que desea eliminar esta empresa?, todo lo relacionado con ella sera eliminado") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Delete') }}
                                                                </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td> -->
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
                $('.btn-delete').click(showDeleteMessage);
            });

            function showDeleteMessage(event){
                event.preventDefault();
                // console.log($(this).attr('id'));
                empresa = $(this).attr('id');
                Swal.fire({
                    title: '¿Estás seguro?',
                    // text:'No podrás revertir esto',
                    html: "<p>Estas a punto de eliminar todo lo relacionado con la empresa</p><span class='font-weight-bold'>¡No podrás revertir esto!</span>",
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
                        $('#delete-'+empresa).submit();
                    }
                })
            }
        });

        
    </script>
@endpush
<!-- onclick=" event.preventDefault();confirm('¿Desea eliminar esta empresa?') ? document.getElementById('delete-form-{{ $empresa->id }}').submit():null;" -->