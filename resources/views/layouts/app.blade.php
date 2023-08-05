<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    {{-- <script src="../assets/js/color-modes.js"></script> --}}

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.111.3">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Navbar Template · Bootstrap v5.3</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbars/">


    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }
    </style>


    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/stye.css') }}">
    <link href="{{ asset('css/navbars.css') }}" rel="stylesheet">
    @livewireStyles
    {{-- @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false" data-turbo-eval="false"></script> --}}

    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
</head>


<body>


    <main>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Fifth navbar example">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Livewire</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="d-flex justify-content-end">
                    <div class="collapse navbar-collapse  " id="navbarsExample05">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" data-turbolinks="false"
                                    href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-turbolinks="false" aria-current="page"
                                    href="/login">login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-turbolinks="false" aria-current="page"
                                    href="/login">register</a>
                            </li>



                        </ul>
                        {{-- <form role="search">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    </form> --}}
                    </div>
                </div>
            </div>
        </nav>
        <div class="container d-flex justify-content-center">
            @yield('content')
        </div>
    </main>


    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ mix('js/turbolinks.js') }}"></script>
    <script>
        $(document).ready(function() { // Add your event handlers inside ready block
            $("a").click(function(event) { // button event handler
                event.preventDefault(); // prevent page from redirecting
            });
        });
    </script>
    @livewireScripts

</body>

</html>
