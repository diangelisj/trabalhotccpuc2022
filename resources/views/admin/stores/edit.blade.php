@extends('admin.layouts.app')

@section('content')
<h1>Criar Loja</h1>
<form action="{{route('admin.stores.update',['store'=>$store->id])}}" method="post" enctype="multipart/form-data">
@csrf
@method("PUT")

<div class="form-group">

    <label>Loja</label>
    <input type="text" name="name" class="form-control" value="{{$store->name}}">

</div>
<div class="form-group">

    <label>Descrição</label>
    <input type="text" name="description"  class="form-control" value="{{$store->description}}">


</div>

<div class="form-group">
    <label>Telefone</label>
    <input type="text" name="phone"  class="form-control" value="{{$store->phone}}">


</div>
<div class="form-group">
    <label>Telefone Celular / WhatsApp</label>
    <input type="text" name="mobile_phone"  class="form-control"value="{{$store->mobile_phone}}">


</div>

    <div class="form-group">
        <label for=""> Logo loja</label>
        <p>
        <img src="{{asset('storage/'.$store->logo)}}" alt="">
        </p>
        <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" >
        @error('logo')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

<div>

</div>


<div>
    <button type="submit" class="btn btn-lg  btn-success">Atualizar Loja</button>
</div>

</form>
@endsection
