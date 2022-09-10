<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PUC MINAS 2022</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <style>
        .front.row {
    margin-bottom: 40px;
        }
    </style>
</head>
<body>

<div class="container nav-bar-style">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <a class="navbar-brand" href="#">
            <img src="http://127.0.0.1:8000/assets/img/01-puc-minas-logo.png">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}">HOME</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        CATEGORIAS
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                        @foreach($categories as $category)
                        <li><a class="dropdown-item" href="#">{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
              
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}">REGISTRE-SE</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">ACESSAR</a>
                </li>


            </ul>
        </div>
    </div>
</nav>
    @auth()
    {{auth()->user()->name}}
    <a class="nav-link" href="#" onclick="event.preventDefault();
    document.querySelector('form.logout').submit(); ">Sair</a>

    <form action="{{route('logout')}}" class="logout" method="POST" style="display:none;">
        @csrf
    </form>
        @endauth
</div>
<!--
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 40px;">

    <a class="navbar-brand" href="{{route('home')}}">L6</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
            <li class="nav-item @if(request()->is('home')) active @endif">
                <a class="nav-link" href="{{route('home')}}">Home 2<span class="sr-only">(current)</span></a>
            </li>
        </ul>

@auth
    <ul class="navbar-nav mr-auto">
        <li class="nav-item @if(request()->is('admin/stores*')) active @endif">
            <a class="nav-link" href="{{route('admin.stores.index')}}">Lojas <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item @if(request()->is('admin/products*')) active @endif">
            <a class="nav-link" href="{{route('admin.products.index')}}">Produtos</a>
        </li>
        <li class="nav-item @if(request()->is('admin/categories*')) active @endif">
            <a class="nav-link" href="{{route('admin.categories.index')}}">Categorias</a>
        </li>
    </ul>

    <div class="my-2 my-lg-0">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="event.preventDefault();
                                                                  document.querySelector('form.logout').submit(); ">Sair</a>

                <form action="{{route('logout')}}" class="logout" method="POST" style="display:none;">
                    @csrf
                </form>
            </li>
            <li class="nav-item">
                <span class="nav-link">{{auth()->user()->name}}</span>
            </li>
            @endauth
         <a href="{{route('cart.index')}}" class="nav-link">
                @if(session()->has('cart'))
                 <span class="badge-danger">{{count(session()->get('cart'))}}</span>

                <!-- Contanto os itens do carrinho - inicio  ------------------>
                <span class="badge-danger">{{array_sum(array_column(session()->get('cart'),'amount'))}}</span>
               <!------------------ Contanto os itens do carrinho - final -------------------
                <span>

                </span>
                @endif
            Carrinho
            <i class="fa fa-shopping-cart"></i>
         </a>

        </ul>
    </div>


    </div>
    </nav>


-->



    <div class="container">
        @include('flash::message')

    </br>
        @yield('content')
    </div>

    @yield('scripts')
    </body>
    </html>