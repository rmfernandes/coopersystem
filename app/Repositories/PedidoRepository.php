<?php

namespace App\Repositories;

use App\Models\Pedido;
use App\Repositories\BaseRepository;

/**
 * Class PedidoRepository
 * @package App\Repositories
 * @version July 10, 2019, 10:22 am -03
*/

class PedidoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pedido::class;
    }
}
