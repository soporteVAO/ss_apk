<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute">
    <div class="container">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="">{{ __('Sales Scripter - VAO') }}</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" href="#menu" role="button" aria-expanded="false" aria-controls="collapseExample">
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse justify-content-end" id="menu">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nc-icon nc-chart-pie-35"></i> {{ __('Dashboard') }}
                    </a>
                </li>
                <!-- <li class="nav-item @if($activePage == 'register') active @endif">
                    <a href="{{ route('register') }}" class="nav-link">
                        <i class="nc-icon nc-badge"></i> {{ __('Register') }}
                    </a>
                </li> -->
                <li class="nav-item @if($activePage == 'login') active @endif">
                    <a href="{{ route('login') }}" class="nav-link">
                        <i class="nc-icon nc-mobile"></i> {{ __('Login') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>