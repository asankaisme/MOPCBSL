<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @stack('custom-styles')
    <title>@yield('title')</title>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffefc1">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="" alt="" srcset=""> My Office Pal</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home') }}">Dashboard <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        @can('view_letters')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Office Administration
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Letters & Memos</a>
                                <a class="dropdown-item" href="#">Vehicle Pass</a>
                                <a class="dropdown-item" href="#">Work Order Forms</a>
                            </div>
                        </li>
                        @endcan
                        @can('view_assets')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Asset Lending
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Projectors & Other</a>
                                </div>
                            </li>
                        @endcan
                        @can('view_requestMenu')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Manage Requests
                                </a>
                                @can('view_visitorPermission')
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @can('add_gatepass')
                                            <a class="dropdown-item" href="{{ route('gatepasses.index') }}">Gate Pass</a>
                                        @endcan
                                        @can('add_visitorPermission')
                                            <a class="dropdown-item" href="#">Visitor Permission</a>
                                        @endcan

                                    </div>
                                @endcan
                            </li>
                        @endcan

                        @can('add_masterdata')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Master Data
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Manage Users</a>
                                    <a class="dropdown-item" href="#">Roles & Permissions</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Manage Assets</a>
                                    <a class="dropdown-item" href="#">Manage Categories</a>
                                </div>
                            </li>
                        @endcan
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown float-right">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Hi! {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Profile Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('body-content')
        </main>
    </div>
    <script src="{{ asset('js/jquery3.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    @stack('footer-scripts')
</body>

</html>
