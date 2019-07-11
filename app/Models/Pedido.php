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
        'qtd' => 'required|integer|min:1',
        'valor_unitario' => 'required|regex:/^\d+(\.\d{1,2})?$/|min:0.01',
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

    /**
     * Events
     * 
     * @var array
     */
    protected $dispatchesEvents = [
        'saving' => \App\Events\PedidoSaving::class
    ];

    public function produto() {
        return $this->belongsTo(Produto::class, 'produto', 'id');
    }

    /**
     * Retorna a situacao formatada
     * 
     * @param string $value
     * 
     * @throws \Exception
     * 
     * @return string
     */
    public function getSituacaoFormatadaAttribute($value) {
        return Pedido::formataSituacao($this->situacao);
    }

    /**
     * Formata a situacao
     * 
     * @param string $situacao
     * 
     * @return string
     * 
     * @todo Transformar em Helper
     */
    public static function formataSituacao($situacao) {
        switch ($situacao) {
            case 'PNDT':
                return 'Pendente de Envio';
                break;
            case 'ENVD':
                return 'Enviado';
                break;
            case 'ENTR':
                return 'Entregue';
                break;
            default:
                return 'ERRO!';
        }
    }

    /**
     * Define todas as situações possíveis
     * 
     * @param string $situacao
     * 
     * @return array
     * 
     * @todo Transformar em Helper
     */
    public static function situacoesPossiveis($situacao) {
        switch ($situacao) {
            case 'PNDT':
                return array('PNDT', 'ENVD');
            case 'ENVD':
                return array('ENVD', 'ENTR');
            case 'ENTR':
                return array('ENTR');
            default:
                return array();
        }
    }

    /**
     * Retorna a data formatada
     * 
     * @param string $value
     * 
     * @return string
     */
    public function getDataFormatadaAttribute($value) {
        return date("d/m/Y", strtotime($this->getAttributes()['data']));
    }

    /**
     * Converte a Data; Datetime->Date
     * 
     * @param string $value
     * 
     * @return string
     */
    public function getDataAttribute($value) {
        return date("Y-m-d", strtotime($value));
    }

    /**
     * Retorna o pedido formatado
     * 
     * @param string $value
     * 
     * @return string
     */
    public function getProdutoFormatadoAttribute($value) {
        $produto = Produto::find($this->produto);
        return $produto->nome;
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
