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
        'valor_unitario' => 'required|regex:/^\d+(\.\d{1,4})?$/',
        'qtd_estoque' => 'required|integer|min:0',
        'situacao' => 'in:DISP,IDSP'
    ];

    /**
     * Retorna a situacao em formato legível por humanos
     * 
     * @param string $value
     * 
     * @throws \Exception
     * 
     * @return string
     */
    public function getSituacaoAttribute($value) {
        switch ($value) {
            case 'DISP':
                return 'Disponível';
                break;
            case 'IDSP':
                return 'Indisponível';
                break;
            default:
                Flash::error("Situação $value desconhecida.");
        }
    }

}
