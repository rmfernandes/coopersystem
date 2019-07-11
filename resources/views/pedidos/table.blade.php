<div class="table-responsive">
    <table class="table" id="pedidos-table">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Qtd.</th>
                <th>Valor Unitário</th>
                <th>Data</th>
                <th>Solicitante</th>
                <th>CEP</th>
                <th>UF</th>
                <th>Município</th>
                <th>Bairro</th>
                <th>Rua</th>
                <th>Número</th>
                <th>Despachante</th>
                <th>Situação</th>
                <th colspan="3">Ação</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pedidos as $pedido)
            <tr>
            <td>{!! $pedido->produto_formatado !!}</td>
            <td>{!! $pedido->qtd !!}</td>
            <td>{!! $pedido->valor_unitario_formatado !!}</td>
            <td>{!! $pedido->data_formatada !!}</td>
            <td>{!! $pedido->solicitante !!}</td>
            <td>{!! $pedido->cep !!}</td>
            <td>{!! $pedido->uf !!}</td>
            <td>{!! $pedido->municipio !!}</td>
            <td>{!! $pedido->bairro !!}</td>
            <td>{!! $pedido->rua !!}</td>
            <td>{!! $pedido->numero !!}</td>
            <td>{!! $pedido->despachante !!}</td>
            <td>{!! $pedido->situacao_formatada !!}</td>
                <td>
                    {!! Form::open(['route' => ['pedidos.destroy', $pedido->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('pedidos.show', [$pedido->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('pedidos.edit', [$pedido->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Você tem certeza?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
