<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja </title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="http://127.0.0.1:8000/assets/img/01-puc-minas-logo.png"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">HOME</a>
                    </li>
          
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/categories">CRIAR CATEGORIA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/products/create">CRIAR PRODUTO</a>
                    </li>
                    <li class="nav-item">
                        <div>

                            <a class="nav-link" href="#" onclick="event.preventDefault();document.querySelector('form.logout').submit();">SAIR</a>
                            <form action="{{route('logout')}}" class="logout" method="post" style="display:none">
                                @csrf
                            </form>
                            <li>
                                <span class="nav-link">
                                {{auth()->user()->name}}
                                </span>
                            </li>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand dark" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                @auth
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item @if(request()->is('admin/store/*')) active @endif ">
                        <a class="nav-link" href="{{route('admin.stores.index')}}">Lojas <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item @if(request()->is('admin/products/*')) active @endif ">
                        <a class="nav-link" href="{{route('admin.products.index')}}">Produtos</a>
                    </li>
                    <li class="nav-item @if(request()->is('admin/categories/*')) active @endif ">
                        <a class="nav-link" href="{{route('admin.categories.index')}}">Categorias</a>
                    </li>


                </ul>


                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>

                <div>

                    <a class="nav-link" href="#" onclick="event.preventDefault();document.querySelector('form.logout').submit();">SAIR</a>
                    <form action="{{route('logout')}}" class="logout" method="post" style="display:none">
                        @csrf
                    </form>
                    <li>
                        <span class="nav-link">
                        {{auth()->user()->name}}
                        </span>
                    </li>
                </div>
                @else

                    <p>Você precisá efetuar o login para acessar a área administrativa!</p>

                @endauth
            </div>
        </nav>
-->

    <div class="container">
        @include('flash::message')
         @yield('content')

    </div>
</div>

<!--footer-->
@include('layouts.footer')
@yield('scripts')
<!--end footer -->
</body>
</html>
