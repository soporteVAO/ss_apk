@extends('layouts.app', ['activePage' => 'users', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'User Profile', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="section-image">
                <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
                <div class="row">

                    <div class="card col-md-8">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="card-title">{{ __('View Profile') }}</h3>
                                </div>
                                <div class="col-4">
                                    <a href="{{route('users.edit',$user)}}" class="btn btn-success">Editar</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="">
                                        <i class="fa fa-user"></i>{{ __('Name') }}
                                    </label>
                                    <p>{{$user->name}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="">
                                        <i class="fa fa-envelope-o"></i>{{ __('Email') }}
                                    </label>

                                    <p>{{$user->email}}</p>
                                </div>
                                <div class="col-md-6">
                                    <label class="">
                                        <i class="fa fa-envelope-o"></i>{{ __('SS Id') }}
                                    </label>
                                    @if($user->ss_id)
                                        <p>{{$user->ss_id}}</p>
                                    @else
                                        <div class="alert alert-warning">Actualice su perfil para obtener su ID</div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="">
                                        <i class="fa-regular fa-building"></i>{{ __('Company Name') }}
                                    </label>

                                    <p>{{$user->empresa->nombre}}</p>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="card-image">
                                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="...">
                            </div>
                            <div class="card-body">
                                <div class="author">
                                    <a href="#">
                                        <img class="avatar border-gray" src="{{ asset('light-bootstrap/img/faces/face-3.jpg') }}" alt="...">
                                        <h5 class="title">{{ __('Mike Andrew') }}</h5>
                                    </a>
                                    <p class="description">
                                        {{ __('michael24') }}
                                    </p>
                                </div>
                                <p class="description text-center">
                                {{ __(' "Lamborghini Mercy') }}
                                    <br> {{ __('Your chick she so thirsty') }}
                                    <br> {{ __('I am in that two seat Lambo') }}
                                </p>
                            </div>
                            <hr>
                            <div class="button-container mr-auto ml-auto">
                                <button href="#" class="btn btn-simple btn-link btn-icon">
                                    <i class="fa fa-facebook-square"></i>
                                </button>
                                <button href="#" class="btn btn-simple btn-link btn-icon">
                                    <i class="fa fa-twitter"></i>
                                </button>
                                <button href="#" class="btn btn-simple btn-link btn-icon">
                                    <i class="fa fa-google-plus-square"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection