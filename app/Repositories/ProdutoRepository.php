<?php

namespace App\Repositories;

use App\Models\Produto;
use App\Repositories\BaseRepository;

/**
 * Class ProdutoRepository
 * @package App\Repositories
 * @version July 9, 2019, 9:52 am -03
*/

class ProdutoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'valor_unitario',
        'qtd_estoque',
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
        return Produto::class;
    }
}
