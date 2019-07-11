<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $produto->id !!}</p>
</div>

<!-- Nome Field -->
<div class="form-group">
    {!! Form::label('nome', 'Nome:') !!}
    <p>{!! $produto->nome !!}</p>
</div>

<!-- Valor Unitario Field -->
<div class="form-group">
    {!! Form::label('valor_unitario', 'Valor Unitário:') !!}
    <p>{!! $produto->valor_unitario_formatado !!}</p>
</div>

<!-- Qtd Estoque Field -->
<div class="form-group">
    {!! Form::label('qtd_estoque', 'Quantidade Estoque:') !!}
    <p>{!! $produto->qtd_estoque !!}</p>
</div>

<!-- Situacao Field -->
<div class="form-group">
    {!! Form::label('situacao', 'Situação:') !!}
    <p>{!! $produto->situacao_formatada !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Criado Em:') !!}
    <p>{!! $produto->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Atualizado Em:') !!}
    <p>{!! $produto->updated_at !!}</p>
</div>

