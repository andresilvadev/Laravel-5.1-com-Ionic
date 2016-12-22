@extends('app')

@section('content')
    <div class="row">
        <h1>Editando Produto {{$product->name}}</h1>
        @include('errors._check')
        <div class="form-group">
            <a href="{{route('admin.products.index')}}" class="btn btn-primary">Listagem de Produtos</a>
        </div>
        {!! Form::model($product,['route'=>['admin.products.update',$product->id]]) !!}
        @include('admin.products._form')
        <div class="form-group">
            {!! Form::submit('Salvar Dados',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection