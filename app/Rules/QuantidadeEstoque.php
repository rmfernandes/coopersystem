<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Produto;

class QuantidadeEstoque implements Rule
{

    private $qtd_estoque;

    /**
     * Create a new rule instance.
     *
     * @param int $produto_id
     * 
     * @param int $qtd_pedido
     * 
     * @return void
     */
    public function __construct($produto_id, $qtd_pedido = 0)
    {
        $produto = Produto::find($produto_id);
        $this->qtd_estoque = $produto->qtd_estoque + $qtd_pedido;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $value <= $this->qtd_estoque;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Quantidade indisponível em estoque. (Disponível: $this->qtd_estoque)";
    }
}
