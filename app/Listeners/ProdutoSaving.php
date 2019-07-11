<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Events\ProdutoSaving as ProdutoSavingEvent;

class ProdutoSaving
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
     * @param  \App\Events\ProdutoSaving  $event
     * @return void
     */
    public function handle(ProdutoSavingEvent $event)
    {
        $event->produto->situacao = $event->produto->situacao;
    }
}
