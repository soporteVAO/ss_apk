@extends('layouts.app', ['activePage' => 'accounts', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Dashboard', 'activeButton' => 'empresas'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="section-image" data-image="../../assets/img/bg5.jpg" ;="">
                <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-8">
                                            <h4 class="card-title">Cuenta</h4>
                                        </div>
                                        <div class="col-4">
                                            <a href="" class="btn btn-success disabled" disabled>Editar</a>
                                        </div>
                                    </div>
                                            
                                        </div>    
                                        <div class="card-body ">
                                                <div class="row">
                                                    <div class="col-md-5 pr-1">
                                                        <div class="form-group">
                                                            <label>Nombre</label>
                                                            <p>{{$account->accountName}}</p>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 pr-1">
                                                        <div class="form-group">
                                                            <label>Account ID</label>
                                                            <p>{{$account->id}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pl-1">
                                                        <div class="form-group">
                                                            <label>Api Key</label>
                                                            <p></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <input type="text" class="form-control" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <!-- <div class="row">
                                                    <div class="col-md-4 pr-1">
                                                        <div class="form-group">
                                                            <label>City</label>
                                                            <input type="text" class="form-control" placeholder="City" value="Mike">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 px-1">
                                                        <div class="form-group">
                                                            <label>Country</label>
                                                            <input type="text" class="form-control" placeholder="Country" value="Andrew">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 pl-1">
                                                        <div class="form-group">
                                                            <label>Postal Code</label>
                                                            <input type="number" class="form-control" placeholder="ZIP Code">
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>About Me</label>
                                                        <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" value="Mike"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                            <div class="clearfix"></div> -->
                                        </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Opportunities</h4>
                                </div>
                                <div class="card-body">

                                </div>
                            </div>       
                        </div>
                                <div class="col-md-4">
                                    <div class="card card-user">
                                        <div class="card-header no-padding">
                                            <div class="card-image">
                                                <img src="http://placeimg.com/640/480/arch" alt="...">
                                            </div>
                                        </div>
                                        <div class="card-body ">
                                            <div class="author">
                                                <a href="#">
                                                    <img class="avatar border-gray" src="http://placeimg.com/640/480/people" alt="...">
                                                    <h5 class="card-title">Tania Keatley</h5>
                                                </a>
                                                <p class="card-description">
                                                    michael24
                                                </p>
                                            </div>
                                            <p class="card-description text-center">
                                                Hey there! As you can see,
                                                <br> it is already looking great.
                                            </p>
                                        </div>
                                        <div class="card-footer ">
                                            <hr>
                                            <div class="button-container text-center">
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
                </div>
            </div>
@endsection