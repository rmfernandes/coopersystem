<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $pedido->id !!}</p>
</div>

<!-- Produto Field -->
<div class="form-group">
    {!! Form::label('produto', 'Produto:') !!}
    <p>{!! $pedido->produto_formatado !!}</p>
</div>

<!-- Qtd Field -->
<div class="form-group">
    {!! Form::label('qtd', 'Quantidade:') !!}
    <p>{!! $pedido->qtd !!}</p>
</div>

<!-- Valor Unitario Field -->
<div class="form-group">
    {!! Form::label('valor_unitario', 'Valor Unitário:') !!}
    <p>{!! $pedido->valor_unitario_formatado !!}</p>
</div>

<!-- Data Field -->
<div class="form-group">
    {!! Form::label('data', 'Data do Pedido:') !!}
    <p>{!! $pedido->data_formatada !!}</p>
</div>

<!-- Solicitante Field -->
<div class="form-group">
    {!! Form::label('solicitante', 'Solicitante:') !!}
    <p>{!! $pedido->solicitante !!}</p>
</div>

<!-- Cep Field -->
<div class="form-group">
    {!! Form::label('cep', 'CEP:') !!}
    <p>{!! $pedido->cep !!}</p>
</div>

<!-- Uf Field -->
<div class="form-group">
    {!! Form::label('uf', 'UF:') !!}
    <p>{!! $pedido->uf !!}</p>
</div>

<!-- Municipio Field -->
<div class="form-group">
    {!! Form::label('municipio', 'Município:') !!}
    <p>{!! $pedido->municipio !!}</p>
</div>

<!-- Bairro Field -->
<div class="form-group">
    {!! Form::label('bairro', 'Bairro:') !!}
    <p>{!! $pedido->bairro !!}</p>
</div>

<!-- Rua Field -->
<div class="form-group">
    {!! Form::label('rua', 'Rua:') !!}
    <p>{!! $pedido->rua !!}</p>
</div>

<!-- Numero Field -->
<div class="form-group">
    {!! Form::label('numero', 'Número:') !!}
    <p>{!! $pedido->numero !!}</p>
</div>

<!-- Despachante Field -->
<div class="form-group">
    {!! Form::label('despachante', 'Despachante:') !!}
    <p>{!! $pedido->despachante !!}</p>
</div>

<!-- Situacao Field -->
<div class="form-group">
    {!! Form::label('situacao', 'Situação:') !!}
    <p>{!! $pedido->situacao_formatada !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Criado Em:') !!}
    <p>{!! $pedido->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Atualizado Em:') !!}
    <p>{!! $pedido->updated_at !!}</p>
</div>

