@extends('app')

@section('content')
    <div class="row">
        <h1>Cupoms</h1>
        <div class="form-group">
            <a href="{{ route('admin.cupoms.create') }}" class="btn btn-primary">Novo cupom</a>
        </div>
        <table class="table table-hover table-bordered table-responsive table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Valor</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cupoms as $cupom)
                <tr>
                    <td>{{$cupom->id}}</td>
                    <td>{{$cupom->code}}</td>
                    <td>{{$cupom->value}}</td>
                    <td>
                        <a href="#" class="btn btn-default btn-sm">Editar</a>
                        <a href="#" class="btn btn-default btn-sm">Excluir</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $cupoms->render()!!}
    </div>
@endsection