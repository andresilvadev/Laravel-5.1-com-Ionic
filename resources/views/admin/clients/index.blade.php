@extends('app')

@section('content')
    <div class="row">
        <h1>Clientes</h1>
        <div class="form-group">
            <a href="{{route('admin.clients.create')}}" class="btn btn-primary">Nova cliente</a>
        </div>
        <table class="table table-hover table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{$client->id}}</td>
                    <td>{{$client->user->name}}</td>
                    <td>
                        <a href="{{route('admin.clients.edit',['id'=>$client->id])}}" class="btn btn-default btn-sm">Editar</a>
                        <a href="{{route('admin.clients.destroy',['id'=>$client->id])}}" class="btn btn-default btn-sm">Excluir</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $clients->render()!!}
    </div>
@endsection