<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pedido
 * @package App\Models
 * @version July 10, 2019, 10:22 am -03
 *
 * @property integer produto
 * @property integer qtd
 * @property float valor_unitario
 * @property string data
 * @property string solicitante
 * @property string cep
 * @property string uf
 * @property string municipio
 * @property string bairro
 * @property string rua
 * @property string numero
 * @property string despachante
 * @property string situacao
 */
class Pedido extends Model
{
    use SoftDeletes;

    public $table = 'pedidos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'produto',
        'qtd',
        'valor_unitario',
        'data',
        'solicitante',
        'cep',
        'uf',
        'municipio',
        'bairro',
        'rua',
        'numero',
        'despachante',
        'situacao'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'produto' => 'integer',
        'qtd' => 'integer',
        'valor_unitario' => 'float',
        'data' => 'date',
        'solicitante' => 'string',
        'cep' => 'string',
        'uf' => 'string',
        'municipio' => 'string',
        'bairro' => 'string',
        'rua' => 'string',
        'numero' => 'string',
        'despachante' => 'string',
        'situacao' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'produto' => 'required|exists:produtos,id',
        'qtd' => 'required|min:0',
        'valor_unitario' => 'required|regex:/^\d+(\,\d{1,4})?$/',
        'data' => 'required|after_or_equal:today',
        'solicitante' => 'required',
        'cep' => 'required|size:9',
        'uf' => 'required|size:2',
        'municipio' => 'required',
        'bairro' => 'required',
        'rua' => 'required',
        'numero' => 'required',
        'despachante' => 'required',
        'situacao' => 'required|in:PNDT,ENVD,ENTR'
    ];

    
}
