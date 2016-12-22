@extends('app')

@section('content')
    <div class="row">
        <h1>Categorias</h1>
        <div class="form-group">
            <a href="{{route('admin.categories.create')}}" class="btn btn-primary">Nova categoria</a>
        </div>
        <table class="table table-hover table-bordered table-responsive table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <a href="{{route('admin.categories.edit',['id'=>$category->id])}}" class="btn btn-default btn-sm">Editar</a>
                        <a href="{{route('admin.categories.destroy',['id'=>$category->id])}}" class="btn btn-default btn-sm">Excluir</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $categories->render()!!}
    </div>
@endsection