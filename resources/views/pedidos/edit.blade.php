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
                   {!! Form::model($pedido, ['route' => ['pedidos.update', $pedido->id], 'method' => 'patch']) !!}
                        @if($pedido->situacao != 'PNDT')
                            @include('pedidos.fields', ['situacoes' => $situacoes, 'situacaoReadonly' => false, 'restrito' => true])
                        @else
                            @include('pedidos.fields', ['situacoes' => $situacoes, 'situacaoReadonly' => false, 'restrito' => false])
                        @endif

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection