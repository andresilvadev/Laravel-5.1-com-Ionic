@extends('app')

@section('content')
    <div class="container">
        <h1>Meus pedidos</h1>

        @include('errors._check')
        <div class="container">
            <a href="{{ route('customer.order.create') }}" class="btn btn-primary">Novo pedido</a>

            <br><br>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->total }}</td>
                        <td>{{ $order->status }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {!! $orders->render() !!}
        </div>
    </div>

@endsection