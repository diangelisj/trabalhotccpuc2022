@extends('admin.layouts.app')

@section('content')
<h1>Criar Loja</h1>
<form action="{{route('admin.stores.store')}}" method="post" enctype="multipart/form-data">

<input type="hidden" name="_token" value="{{csrf_token()}}">

<div class="form-group">

    <label>Loja</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{@old('name')}}">
    @error('name')
        <div class="invalid-feedback">
            {{$message}}
        </div>

    @enderror
</div>
<div class="form-group">

    <label>Descrição</label>
<input type="text" name="description"  class="form-control @error('description') is-invalid @enderror" value="{{@old('description')}}">
    @error('description')
    <div class="invalid-feedback">
        {{$message}}
    </div>

@enderror


</div>

<div class="form-group">
    <label>Telefone</label>
    <input type="text" name="phone"  class="form-control  @error('phone') is-invalid @enderror" value="{{@old('name')}}">
    @error('phone')
    <div class="invalid-feedback">
        {{$message}}
    </div>

@enderror

</div>
<div class="form-group">
    <label>Celular  /  WhatsApp </label>
    <input type="text" name="mobile_phone"  class="form-control @error('mobile_phone') is-invalid @enderror" value="{{@old('name')}}">
    @error('mobile_phone')
    <div class="invalid-feedback">
        {{$message}}
    </div>

@enderror

</div>

    <div class="form-group">
        <label for=""> Logo loja</label>
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

    <label>Usuário</label>
{{--    <select name="user" id="">--}}
{{--        @foreach($users as $user)--}}
{{--    <option value="{{$user->id}}">{{$user->name}}</option>--}}
{{--        @endforeach--}}
{{--    </select>--}}

</div>

<div>
    <button type="submit" class="btn btn-lg  btn-success">Ciar Loja</button>
</div>

</form>
@endsection
