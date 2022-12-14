@extends('admin.layouts.app')

@section('content')

    <a href="{{route('admin.products.create')}}" class="btn btn-lg btn-success">Criar Produto</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Lola</th>
                    <th>Ações</th>
                </tr>

            </thead>

            <tbody>

            @foreach($products as $p)
                <tr>
                    <th>{{$p->id}}</th>
                    <th>{{$p->name}}</th>
                    <th>R$ : {{number_format($p->price,2,',','.')}}</th>
                    <th>{{$p->store->name}}</th>
                    <th>

                        <div class="btn-group">
                            <a href="{{route('admin.products.edit',['product'=>$p->id])}}" class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{route('admin.products.destroy',['product'=>$p->id])}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-sm btn-danger"> REMOVER</button>

                            </form>
                        </div>

                    </th>
                </tr>

            @endforeach

            </tbody>

        </table>
        {{$products->links()}}

@endsection