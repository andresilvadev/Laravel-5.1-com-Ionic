@extends('app')

@section('content')
    <div class="row">
        <h1>Nova categoria</h1>
        @include('errors._check')
        <div class="form-group">
            <a href="{{route('admin.categories.index')}}" class="btn btn-primary">Listagem de categorias</a>
        </div>
        {!! Form::open(['route'=>'admin.categories.store']) !!}
        @include('admin.categories._form')
        <div class="form-group">
            {!! Form::submit('Criar categoria',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection