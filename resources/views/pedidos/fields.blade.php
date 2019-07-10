<!-- Produto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('produto', 'Produto:') !!}
    {!! Form::text('produto', null, ['class' => 'form-control']) !!}
</div>

<!-- Qtd Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qtd', 'Quantidade:') !!}
    {!! Form::number('qtd', null, ['class' => 'form-control']) !!}
</div>

<!-- Valor Unitario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valor_unitario', 'Valor Unitário:') !!}
    {!! Form::number('valor_unitario', null, ['class' => 'form-control', 'step' => '0.01']) !!}
</div>

<!-- Data Field -->
<div class="form-group col-sm-6">
    {!! Form::label('data', 'Data do Pedido:') !!}
    {!! Form::date('data', null, ['class' => 'form-control','id'=>'data']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#data').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Solicitante Field -->
<div class="form-group col-sm-6">
    {!! Form::label('solicitante', 'Solicitante:') !!}
    {!! Form::text('solicitante', null, ['class' => 'form-control']) !!}
</div>

<!-- Cep Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cep', 'CEP:') !!}
    {!! Form::text('cep', null, ['class' => 'form-control']) !!}
</div>

<!-- Uf Field -->
<div class="form-group col-sm-6">
    {!! Form::label('uf', 'UF:') !!}
    {!! Form::text('uf', null, ['class' => 'form-control']) !!}
</div>

<!-- Municipio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('municipio', 'Município:') !!}
    {!! Form::text('municipio', null, ['class' => 'form-control']) !!}
</div>

<!-- Bairro Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bairro', 'Bairro:') !!}
    {!! Form::text('bairro', null, ['class' => 'form-control']) !!}
</div>

<!-- Rua Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rua', 'Rua:') !!}
    {!! Form::text('rua', null, ['class' => 'form-control']) !!}
</div>

<!-- Numero Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero', 'Número:') !!}
    {!! Form::text('numero', null, ['class' => 'form-control']) !!}
</div>

<!-- Despachante Field -->
<div class="form-group col-sm-6">
    {!! Form::label('despachante', 'Despachante:') !!}
    {!! Form::text('despachante', null, ['class' => 'form-control']) !!}
</div>

<!-- Situacao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('situacao', 'Situação:') !!}
    {!! Form::text('situacao', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pedidos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
