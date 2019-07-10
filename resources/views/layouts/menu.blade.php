<li class="{{ Request::is('produtos*') || Request::is('/') ? 'active' : '' }}">
    <a href="{!! route('produtos.index') !!}"><i class="fa fa-edit"></i><span>Produtos</span></a>
</li>