@extends('admin.layouts.app')

@section('content')


    @if(!$store)
    <a href="{{route('admin.stores.create')}}" class="btn btn-lg btn-success">Criar loja</a>
    @else
    <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Loja</th>
                    <th>Proprietário</th>
                    <th>Total de produtos</th>
                    <th>Ações</th>
                </tr>

            </thead>

            <tbody>


                <tr>
                    <th>{{$store->id}}</th>
                    <th>{{$store->name}}</th>
                    <th>{{$store->products->count()}}</th>
                    <th>
                        <div class="btn-group">

                            <a href="{{route('admin.stores.edit',['store'=>$store->id])}}" class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{route('admin.stores.destroy',['store'=>$store->id])}}"method="post">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-sm btn-danger">Remover</button>
                            </form>
                        </div>

                    </th>
                </tr>



            </tbody>

        </table>

    @endif
@endsection
