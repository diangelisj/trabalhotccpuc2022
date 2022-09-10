@extends('layouts.front')
@section('content')

    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Produtos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
        </nav>
    </div>

    <div class="col-12">
        <div class="col-6">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">

                    @if($product->photos->count())
                        <img src="{{asset('storage/'.$product->photos->first()->image)}}"  class="card-img-top" alt="">
                        @foreach($product->photos as $photo)
                    <div class="carousel-item active">
                        <img src="..." class="d-block w-100" alt="...">
                    </div>
                        @endforeach

                </div>
                @else

                @endif
            </div>
        </div>
    </div>
    <div class="row" style="margin-top:20px ">
        <div class="col-6">
            @if($product->photos->count())
                <img src="{{asset('storage/'.$product->photos->first()->image)}}"  class="card-img-top" alt="">
                <div class="row">
                    @foreach($product->photos as $photo)
                        <div class="col-4">
                            <img src="{{asset('storage/'.$photo->image)}}"  alt=""  class="img-fluid">
                        </div>

                    @endforeach
                </div>
            @else
                <img src="{{asset('assets/img/no-photo.jpg')}}"  class="card-img-top" alt="" >

            @endif

        </div>
            <div class="col-6 fluid">
               <div class="col-md-12">
                   <h2> {{$product->name}}</h2>

                   <p> {{$product->description}}</p>
                   <h3>RS: {{number_format($product->price,'2',',','.')}}</h3>
                   <span>Loja: {{$product->store->name}}</span>
               </div>


                <hr>

        <div class="product-add col-md-12">

            <form action="{{route('cart.add')}}" method="POST">
                @csrf
                <input type="hidden" name="product[name]" value="{{$product->name}}">
                <input type="hidden" name="product[price]"value="{{$product->price}}">
                <input type="hidden" name="product[slug]"value="{{$product->slug}}">
                <div class="form-group">
                    <label>Quantidade</label>
                    <input type="number" name="product[amount]" class="form-control col-md-2" value="1">
                </div>
                <button  class="btn btn-danger">Comprar</button>
            </form>
        </div>

    </div>
    </div>
    <hr>
    <div class="row">

        {{$product->body}}
    </div>

@endsection
