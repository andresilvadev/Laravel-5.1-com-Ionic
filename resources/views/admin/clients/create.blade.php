@extends('app')

@section('content')
    <div class="row">
        <h1>Novo cliente</h1>
        @include('errors._check')
        <div class="form-group">
            <a href="{{route('admin.clients.index')}}" class="btn btn-primary">Listagem de clientes</a>
        </div>
        {!! Form::open(['route'=>'admin.clients.store']) !!}
        @include('admin.clients._form')
        <div class="form-group">
            {!! Form::submit('Cadastrar cliente',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection