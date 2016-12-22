@extends('app')

@section('content')
    <div class="row">
        <h1>Editando Categoria {{$category->name}}</h1>
        @include('errors._check')
        <div class="form-group">
            <a href="{{route('admin.categories.index')}}" class="btn btn-primary">Voltar para listagem</a>
        </div>
        {!! Form::model($category,['route'=>['admin.categories.update',$category->id]]) !!}
        @include('admin.categories._form')
        <div class="form-group">
            {!! Form::submit('Salvar Categoria',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection