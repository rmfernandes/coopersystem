<!-- Produto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('produto', 'Produto:') !!}
    @if($restrito)
        {!! Form::select('produto', $produtos, $pedido->produto, ['class' => 'form-control', 'readonly' => $restrito]); !!}
    @else
        {!! Form::select('produto', $produtos, null, ['class' => 'form-control', 'id' => 'produto', 'readonly' => $restrito]); !!}
    @endif
</div>

<!-- Qtd Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qtd', 'Quantidade:') !!}
    {!! Form::number('qtd', null, ['class' => 'form-control', 'id' => 'qtd', 'min' => '1', 'readonly' => $restrito]) !!}
</div>

<!-- Valor Unitario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valor_unitario', 'Valor Unitário:') !!}
    {!! Form::number('valor_unitario', null, ['class' => 'form-control', 'id' => 'valor_unitario', 'step' => '0.01', 'min' => '0.01', 'readonly' => $restrito]) !!}
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
        });

        function adcVirgulas(valor) {
            valor += '';
            if (valor.indexOf('.') !== -1) {
                p = valor.split('.');
                p1 = p[0];
                p2 = p[1];
                while (p2.length < 2) {
                    p2 += '0';
                }
            } else {
                p1 = valor;
                p2 = '00';
            }
            return p1 + '.' + p2;

        }

        function getValor() {
            $.ajax({
                url: '/valor/' + $("#produto").val(),
                type: 'get',
                data: {},
                success: function(data) {
                if (data.success == true) {
                    valor_unitario = data.valor * $('#qtd').val();
                    $("#valor_unitario").val(adcVirgulas(valor_unitario));
                } else {
                    alert('Erro ao recuperar o valor unitário');
                }

                },
                error: function(jqXHR, textStatus, errorThrown) {}
            });
        }

        $("#produto").change(getValor);
        $("#qtd").change(getValor);

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
