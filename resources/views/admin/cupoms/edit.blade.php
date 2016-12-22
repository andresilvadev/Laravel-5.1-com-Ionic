@extends('app')

@section('content')
    <div class="row">
        <h1>Editando cupom {{$cupom->name}}</h1>
        @include('errors._check')
        <div class="form-group">
            <a href="{{route('admin.cupoms.index')}}" class="btn btn-primary">Voltar para listagem</a>
        </div>
        {!! Form::model($cupom,['route'=>['admin.cupoms.update',$cupom->id]]) !!}
        @include('admin.categories._form')
        <div class="form-group">
            {!! Form::submit('Salvar cupom',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection