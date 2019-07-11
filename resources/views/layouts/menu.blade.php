<li class="{{ Request::is('produtos*') ? 'active' : '' }}">
    <a href="{!! route('produtos.index') !!}"><i class="fa fa-edit"></i><span>Produtos</span></a>
</li>
<li class="{{ Request::is('pedidos*') || Request::is('/') ? 'active' : '' }}">
    <a href="{!! route('pedidos.index') !!}"><i class="fa fa-edit"></i><span>Pedidos</span></a>
</li>