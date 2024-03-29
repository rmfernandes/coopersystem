@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pedido
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'pedidos.store']) !!}

                        @include('pedidos.fields', ['produtos' => $produtos, 'situacoes' => $situacoes, 'situacaoReadonly' => true, 'restrito' => false])

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
