<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Events\PedidoSaving as PedidoSavingEvent;
use App\Models\Produto;

class PedidoSaving
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PedidoSaving  $event
     * 
     * @return void
     */
    public function handle(PedidoSavingEvent $event)
    {
        $pedidoNovo = $event->pedido; //Model
        $pedidoOriginal = $pedidoNovo->getOriginal(); //Array

        $produtoNovo = Produto::find($pedidoNovo->produto);

        if (isset($pedidoOriginal['produto'])) {
            $produtoOriginal = Produto::find($pedidoOriginal['produto']);
        
            if ($produtoOriginal == $produtoNovo && $pedidoNovo->qtd != $pedidoOriginal['qtd']) { //atualiza quantidades do mesmo produto
                $produtoNovo->qtd_estoque += $pedidoOriginal['qtd'] - $pedidoNovo->qtd;
                $produtoNovo->save();
            } elseif ($produtoOriginal != $produtoNovo) {
                $produtoOriginal->qtd_estoque += $pedidoOriginal['qtd'];
                $produtoOriginal->save();
                $produtoNovo->qtd_estoque -= $pedidoNovo->qtd;
                $produtoNovo->save();
            }
        } else {
            $produtoNovo->qtd_estoque -= $pedidoNovo->qtd;
            $produtoNovo->save();
        }
    }
}
