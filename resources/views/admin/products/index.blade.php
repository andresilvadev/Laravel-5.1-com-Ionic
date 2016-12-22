@extends('app')

@section('content')
    <div class="row">
        <h1>Listagem de produtos</h1>
        <div class="form-group">
            <a href="{{route('admin.products.create')}}" class="btn btn-primary">Nova produto</a>
        </div>
        <table class="table table-hover table-bordered table-responsive table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Produto</th>
                <th>Preço</th>
                <th>Categoria</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>
                        <a href="{{route('admin.products.edit',['id'=>$product->id])}}" class="btn btn-default btn-sm">Editar</a>
                        <a href="{{route('admin.products.destroy',['id'=>$product->id])}}" class="btn btn-default btn-sm">Excluir</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $products->render() !!}
    </div>
@endsection