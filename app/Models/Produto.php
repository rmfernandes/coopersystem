<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Produto
 * @package App\Models
 * @version July 9, 2019, 9:52 am -03
 *
 * @property string nome
 * @property float valor_unitario
 * @property integer qtd_estoque
 * @property string situacao
 */
class Produto extends Model
{
    use SoftDeletes;

    public $table = 'produtos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nome',
        'valor_unitario',
        'qtd_estoque',
        'situacao'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nome' => 'string',
        'valor_unitario' => 'float',
        'qtd_estoque' => 'integer',
        'situacao' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required',
        'valor_unitario' => 'required|regex:/^\d+(\.\d{1,2})?$/|min:0.01',
        'qtd_estoque' => 'required|integer|min:0',
        'situacao' => 'in:DISP,IDSP'
    ];

    /**
     * Events
     * 
     * @var array
     */
    protected $dispatchesEvents = [
        'saving' => \App\Events\ProdutoSaving::class
    ];

    /**
     * Ajusta situacao do produto
     * 
     * @param int $qtd
     * 
     * @return string
     */
    public function getSituacaoAttribute($value) {
        if ($this->qtd_estoque > 0) {
            return 'DISP';
        } else {
            return 'IDSP';
        }
    }

    /**
     * Retorna a situacao em formato legível por humanos
     * 
     * @param string $value
     * 
     * @return string
     */
    public function getSituacaoFormatadaAttribute($value) {
        switch ($this->situacao) {
            case 'DISP':
                return 'Disponível';
                break;
            case 'IDSP':
                return 'Indisponível';
                break;
            default:
                return 'ERRO!';
        }
    }

    /**
     * Formata o valor unitario para os campos internos
     * 
     * @param string $value
     * 
     * @return string
     */
    public function getValorUnitarioAttribute($value) {
        return number_format($value, 2);
    }

    /**
     * Formata o valor unitario para a listagem
     * 
     * @param string $value
     * 
     * @return string
     */
    public function getValorUnitarioFormatadoAttribute($value) {
        return 'R$' . number_format($this->valor_unitario, 2, ',', '');
    }

}
