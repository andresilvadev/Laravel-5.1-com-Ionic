@extends('app')

@section('content')
    <div class="row">
        <h1>Novo produto</h1>
        @include('errors._check')
        <div class="form-group">
            <a href="{{route('admin.products.index')}}" class="btn btn-primary">Listagem de produtos</a>
        </div>
        {!! Form::open(['route'=>'admin.products.store']) !!}
        @include('admin.products._form')
        <div class="form-group">
            {!! Form::submit('Criar produto',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection