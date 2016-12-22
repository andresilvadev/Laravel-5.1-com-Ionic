@extends('app')

@section('content')
    <div class="row">
        <h1>Nova Categoria</h1>
        @include('errors._check')
        <div class="form-group">
            <a href="{{route('admin.categories.index')}}" class="btn btn-primary">Listagem de Categorias</a>
        </div>
        {!! Form::open(['route'=>'admin.categories.store']) !!}
        @include('admin.categories._form')
        <div class="form-group">
            {!! Form::submit('Criar Categoria',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection