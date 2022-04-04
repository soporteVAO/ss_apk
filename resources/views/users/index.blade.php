@extends('layouts.app', ['activePage' => 'users', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Icons', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card data-tables">

                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card-title">Users</div>
                                    <div class="card-category">Lorem Ipsum</div>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{route('users.create')}}" class="btn btn-success">Crear Usuario</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-2">
                        </div>

                        <div class="toolbar">
                            <!--Here you can write extra buttons/actions for the toolbar-->
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Empresa</th>
                                        <th>SS ID</th>
                                        <th>Start</th>
                                        <th>Rol</th>
                                        <!-- <th>Actions</th> -->
                                    </tr>
                                </thead>
                                <!-- <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Empresa</th>
                                        <th>Start</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot> -->
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td><a href="{{route('users.show', $user)}}">{{$user->name}}</a></td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->empresa->nombre}}</td>
                                            <td class="@if(!$user->ss_id) alert-warning @endif">{{$user->ss_id}}</td>
                                            <td>{{$user->created_at}}</td>
                                            <td>{{$user->role->name}}</td>
                                            <td class="d-flex justify-content-end">
                                                <a href="{{route('users.show', $user)}}" class="btn btn-info btn-link btn-xs">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="{{route('users.edit',$user)}}" class="btn btn-info btn-link btn-xs" >
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="" class="btn btn-info btn-link btn-xs btn-delete" id="user-{{$user->id}}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                                <form action="{{route('users.delete',$user)}}" method="POST" id="delete-user-{{$user->id}}">
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
                $('.btn-delete').click(showDeleteMessage);
            });
        });

        function showDeleteMessage(event){
            event.preventDefault();
            // console.log($(this).attr('id'));
            user = $(this).attr('id');
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
                    $('#delete-'+user).submit();
                }
            })
        }
    </script>
@endpush