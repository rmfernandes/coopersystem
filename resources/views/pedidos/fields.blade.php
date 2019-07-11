<!-- Produto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('produto', 'Produto:') !!}
    {!! Form::text('produto', null, ['class' => 'form-control', 'readonly' => $restrito]) !!}
</div>

<!-- Qtd Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qtd', 'Quantidade:') !!}
    {!! Form::number('qtd', null, ['class' => 'form-control', 'min' => '1', 'readonly' => $restrito]) !!}
</div>

<!-- Valor Unitario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valor_unitario', 'Valor Unitário:') !!}
    {!! Form::number('valor_unitario', null, ['class' => 'form-control', 'step' => '0.01', 'min' => '0.01', 'readonly' => $restrito]) !!}
</div>

<!-- Data Field -->
<div class="form-group col-sm-6">
    {!! Form::label('data', 'Data do Pedido:') !!}
    {!! Form::date('data', null, ['class' => 'form-control','id'=>'data', 'readonly' => $restrito]) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#data').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true
        })
    </script>
@endsection

<!-- Solicitante Field -->
<div class="form-group col-sm-6">
    {!! Form::label('solicitante', 'Solicitante:') !!}
    {!! Form::text('solicitante', null, ['class' => 'form-control', 'readonly' => $restrito]) !!}
</div>

<!-- Cep Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cep', 'CEP:') !!}
    {!! Form::text('cep', null, ['class' => 'form-control', 'readonly' => $restrito]) !!}
</div>

<!-- Uf Field -->
<div class="form-group col-sm-6">
    {!! Form::label('uf', 'UF:') !!}
    {!! Form::text('uf', null, ['class' => 'form-control', 'readonly' => $restrito]) !!}
</div>

<!-- Municipio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('municipio', 'Município:') !!}
    {!! Form::text('municipio', null, ['class' => 'form-control', 'readonly' => $restrito]) !!}
</div>

<!-- Bairro Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bairro', 'Bairro:') !!}
    {!! Form::text('bairro', null, ['class' => 'form-control', 'readonly' => $restrito]) !!}
</div>

<!-- Rua Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rua', 'Rua:') !!}
    {!! Form::text('rua', null, ['class' => 'form-control', 'readonly' => $restrito]) !!}
</div>

<!-- Numero Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero', 'Número:') !!}
    {!! Form::text('numero', null, ['class' => 'form-control', 'readonly' => $restrito]) !!}
</div>

<!-- Despachante Field -->
<div class="form-group col-sm-6">
    {!! Form::label('despachante', 'Despachante:') !!}
    {!! Form::text('despachante', null, ['class' => 'form-control', 'readonly' => $restrito]) !!}
</div>

<!-- Situacao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('situacao', 'Situação:') !!}
    @if($situacaoReadonly)
        {!! Form::select('situacao', $situacoes, 'PNDT', ['class' => 'form-control', 'readonly' => $situacaoReadonly]); !!}
    @else      
        {!! Form::select('situacao', $situacoes, $pedido->situacao, ['class' => 'form-control', 'readonly' => $situacaoReadonly]); !!}
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pedidos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
