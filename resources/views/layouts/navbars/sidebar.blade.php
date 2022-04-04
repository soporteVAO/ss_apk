<div class="sidebar" data-image="{{ asset('light-bootstrap/img/sidebar-5.jpg') }}">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="https://ventasdealtooctanaje.com" class="simple-text">
                <!-- {{ __("Creative Tim") }} -->
                <img src="{{asset('img/logoblanco-esq_inferior.png')}}" alt="" class="img-fluid w-25">
            </a>
        </div>
        <div class="user">
                    <div class="photo">
                        <img src="http://placeimg.com/640/480/people">
                    </div>
                    <div class="info">
                        
                            <a class="collapse" data-bs-toggle="collapse" href="#profilemenu" role="button" aria-expanded="false" aria-controls="collapseExample">
                                {{Auth::user()->name}}
                                <div class="caret"></div>
                            </a>
                        
                        <div class="collapse" id="profilemenu">
                            <ul class="nav">
                                <li>
                                    <a class="profile-dropdown" href="{{route('profile.index')}}">
                                        <span class="sidebar-mini">MP</span>
                                        <span class="sidebar-normal">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="profile-dropdown" href="{{route('profile.edit')}}">
                                        <span class="sidebar-mini">EP</span>
                                        <span class="sidebar-normal">Edit Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="profile-dropdown" href="#pablo">
                                        <span class="sidebar-mini">S</span>
                                        <span class="sidebar-normal">Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
        <ul class="nav">
            <li class="nav-item @if($activePage == 'dashboard') active @endif">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>{{ __("Dashboard") }}</p>
                </a>
            </li>
            @if(Auth::user()->isAdmin())
            <li class="nav-item @if($activePage == 'empresas') active @endif">
                <a class="nav-link" href="{{route('empresas.index')}}">
                    <i class="fa-regular fa-building"></i>
                    <p>{{ __("Business") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'users') active @endif">
                <a class="nav-link" href="{{route('users.index')}}">
                    <i class="fa-solid fa-users"></i>
                    <p>{{ __("Users") }}</p>
                </a>
            </li>
            @endif
            <!-- <li class="nav-item @if($activePage == 'accounts') active @endif">
                <a class="nav-link" href="{{route('account.index')}}">
                    <i class="fa-solid fa-folder-tree"></i>
                    <p>{{ __("Accounts") }}</p>
                </a>
            </li> -->
            <li class="nav-item @if($activePage == 'fields') active @endif">
                <a class="nav-link" href="{{route('fields.index')}}">
                    <i class="fa-solid fa-table-list"></i>                    
                    <p>{{ __("Fields") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'oportunidades') active @endif">
                <a class="nav-link" href="{{route('oportunidades.index')}}">
                    <i class="fa-solid fa-handshake"></i>
                    <p>{{ __("Oportunidades") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'guiones') active @endif">
                <a class="nav-link" href="{{route('guiones.index')}}">
                    <i class="fa-solid fa-comments"></i>
                    <p>{{ __("Guiones") }}</p>
                </a>
            </li>
            
            <!-- <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#empresas_sidebar" @if($activeButton =='empresas') aria-expanded="true" @endif>
                    
                    <i class="fa-regular fa-building"></i>
                    <p>
                        {{ __('Empresas') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if($activeButton =='empresas') show @endif" id="empresas_sidebar">
                    <ul class="nav">
                        <li class="nav-item @if($activePage == 'empresasIndex') active @endif">
                            <a class="nav-link" href="{{route('empresas.index')}}">
                                <i class="fa-brands fa-simplybuilt"></i>
                                <i class="nc-icon nc-single-02"></i>
                                <p>{{ __("All Empresas") }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'user-management') active @endif">
                            <a class="nav-link" href="{{route('empresas.create')}}">
                                <i class="nc-icon nc-circle-09"></i>
                                <i class="fa-regular fa-square-plus"></i>
                                <p>{{ __("Create Empresa") }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li> -->
            <!-- <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#laravelExamples" @if($activeButton =='oportunidades') aria-expanded="true" @endif>
                    <i>
                        <img src="{{ asset('light-bootstrap/img/laravel.svg') }}" style="width:25px">
                    </i>
                    <p>
                        {{ __('Oportunidades') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if($activeButton =='oportunidades') show @endif" id="laravelExamples">
                    <ul class="nav">
                        
                        <li class="nav-item @if($activePage == 'users') active @endif">
                            <a class="nav-link" href="{{route('oportunidades.index')}}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>{{ __("All opportunitties") }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'user-management') active @endif">
                            <a class="nav-link" href="{{route('users.index')}}">
                                <i class="nc-icon nc-circle-09"></i>
                                <p>{{ __("Create Opportunittie") }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li> -->
           
            <!-- <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#laravelExamples" @if($activeButton =='laravel') aria-expanded="true" @endif>
                    <i>
                        <img src="{{ asset('light-bootstrap/img/laravel.svg') }}" style="width:25px">
                    </i>
                    <p>
                        {{ __('Laravel example') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if($activeButton =='laravel') show @endif" id="laravelExamples">
                    <ul class="nav">
                        <li class="nav-item @if($activePage == 'user') active @endif">
                            <a class="nav-link" href="{{route('profile.edit')}}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>{{ __("User Profile") }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'user-management') active @endif">
                            <a class="nav-link" href="{{route('users.index')}}">
                                <i class="nc-icon nc-circle-09"></i>
                                <p>{{ __("User Management") }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li> -->

            <!-- <li class="nav-item @if($activePage == 'table') active @endif">
                <a class="nav-link" href="{{route('page.index', 'table')}}">
                    <i class="nc-icon nc-notes"></i>
                    <p>{{ __("Table List") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'typography') active @endif">
                <a class="nav-link" href="{{route('page.index', 'typography')}}">
                    <i class="nc-icon nc-paper-2"></i>
                    <p>{{ __("Typography") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'icons') active @endif">
                <a class="nav-link" href="{{route('page.index', 'icons')}}">
                    <i class="nc-icon nc-atom"></i>
                    <p>{{ __("Icons") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'maps') active @endif">
                <a class="nav-link" href="{{route('page.index', 'maps')}}">
                    <i class="nc-icon nc-pin-3"></i>
                    <p>{{ __("Maps") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'notifications') active @endif">
                <a class="nav-link" href="{{route('page.index', 'notifications')}}">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>{{ __("Notifications") }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active bg-danger" href="{{route('page.index', 'upgrade')}}">
                    <i class="nc-icon nc-alien-33"></i>
                    <p>{{ __("Upgrade to PRO") }}</p>
                </a>
            </li> -->
        </ul>
    </div>
</div>
