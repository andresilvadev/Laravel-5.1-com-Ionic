@extends('app')

@section('content')
    <div class="row">
        <h1>Novo Cupom</h1>
        @include('errors._check')
        <div class="form-group">
            <a href="{{route('admin.cupoms.index')}}" class="btn btn-primary">Listagem de Cupons</a>
        </div>
        {!! Form::open(['route'=>'admin.cupoms.store']) !!}
        @include('admin.cupoms._form')
        <div class="form-group">
            {!! Form::submit('Criar Cupom',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection