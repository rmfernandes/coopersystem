<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Pedido;

class SituacaoPedido implements Rule
{

    private $situacaoOriginal;
    private $situacao;

    /**
     * Create a new rule instance.
     *
     * @param string $situacaoOriginal
     * 
     * @return void
     */
    public function __construct($situacaoOriginal)
    {
        $this->situacaoOriginal = $situacaoOriginal;
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
        $this->situacao = $value;
        return in_array($this->situacao, Pedido::situacoesPossiveis($this->situacaoOriginal));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Não é possível avançar a situação de '" . Pedido::formataSituacao($this->situacaoOriginal) . "' para '" . Pedido::formataSituacao($this->situacao) . "'.";
    }
}
