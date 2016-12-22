@extends('app')

@section('content')

    <div class="container">
        <h1>Novo Pedido</h1>

        @include('errors._check')
        <div class="container">
            {!! Form::open(['route'=>'customer.order.store', 'class' => 'form']) !!}

            <div class="form-group">

                <dl class="dl-horizontal">
                    <dt><h3> Valor total R$:</h3></dt>
                    <dd><h3 id="total"></h3></dd>
                </dl>

                <a href="#" class="btn btn-default" id="js-btn-novo-item">Novo item</a>

                <br><br>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <select class="form-control" name="items[0][product_id]" >
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" data-price="{{ $product->price }}"> {{ $product->name }} --- {{ $product->price }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            {!! Form::text('items[0][qtd]', 1, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>

            <div class="form-group">
                {!! Form::submit('Criar order', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>

    </div>

@endsection

@section('post-script')
    <script>
        $('#js-btn-novo-item').click(function(){
            var linha = $('table tbody > tr:last'),
                novaLinha = linha.clone(),
                length = $('table tbody tr').length;
            novaLinha.find('td').each(function(){
                var td = $(this),
                    input = td.find('input,select'),
                    name = input.attr('name');
                input.attr('name', name.replace((length - 1) + "", length + ""));
            });
            novaLinha.find('input').val(1);
            novaLinha.insertAfter(linha);
            calculateTotal();
        });
        $(document.body).on('click','select', function(){
            calculateTotal();
        });
        $(document.body).on('blur','input', function(){
            calculateTotal();
        });
        function calculateTotal() {
            var total = 0,
                trLen = $('table tbody tr').length,
                tr = null, price, qtd;
            for (var i = 0 ; i < trLen ; i++){
                tr = $('table tbody tr').eq(i);
                price = tr.find(':selected').data('price');
                qtd = tr.find('input').val();
                total +=  price * qtd;            }
            $('#total').html(total);
        }
    </script>
@endsection