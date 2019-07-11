<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Response;

class ValorController extends Controller
{
    /**
     * Recupera o valor do produto
     * 
     * @param int $id
     * 
     * @return Response
     */
    public function getValor($id)
    {
        $valor = Produto::find($id)->valor_unitario;

        return Response::json(['success' => true, 'valor' => $valor]);
    }
}
