<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePedidoRequest;
use App\Http\Requests\UpdatePedidoRequest;
use App\Repositories\PedidoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Rules\QuantidadeEstoque;
use App\Rules\SituacaoPedido;
use App\Models\Pedido;
use App\Models\Produto;

class PedidoController extends AppBaseController
{
    /** @var  PedidoRepository */
    private $pedidoRepository;

    public function __construct(PedidoRepository $pedidoRepo)
    {
        $this->pedidoRepository = $pedidoRepo;
    }

    /**
     * Display a listing of the Pedido.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $pedidos = $this->pedidoRepository->all();

        return view('pedidos.index')
            ->with('pedidos', $pedidos);
    }

    /**
     * Show the form for creating a new Pedido.
     *
     * @return Response
     */
    public function create()
    {
        $situacoes = array(
            'PNDT' => Pedido::formataSituacao('PNDT'),
        );

        $produtos = Produto::select('id', 'nome')->orderBy('id', 'asc')->get();

        $selectProdutos = array();

        foreach($produtos as $produto) {
            $selectProdutos[$produto->id] = $produto->nome;
        }

        return view('pedidos.create')->with('produtos', $selectProdutos)->with('situacoes', $situacoes);
    }

    /**
     * Store a newly created Pedido in storage.
     *
     * @param CreatePedidoRequest $request
     *
     * @return Response
     */
    public function store(CreatePedidoRequest $request)
    {
        $input = $request->all();

        $request->validate([
            'qtd' => [new QuantidadeEstoque($input['produto'])]
        ]);

        $pedido = $this->pedidoRepository->create($input);

        Flash::success('Pedido criado com sucesso.');

        return redirect(route('pedidos.index'));
    }

    /**
     * Display the specified Pedido.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pedido = $this->pedidoRepository->find($id);

        if (empty($pedido)) {
            Flash::error('Pedido não encontrado.');

            return redirect(route('pedidos.index'));
        }

        return view('pedidos.show')->with('pedido', $pedido);
    }

    /**
     * Show the form for editing the specified Pedido.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pedido = $this->pedidoRepository->find($id);

        if (empty($pedido)) {
            Flash::error('Pedido não encontrado.');

            return redirect(route('pedidos.index'));
        }

        if ($pedido->situacao == 'ENTR') {
            Flash::error('Não é possível alterar pedidos após entregues.');

            return redirect(route('pedidos.index'));
        } elseif ($pedido->situacao != 'PNDT') { //PNDT é o unico que permite alterações, feito desta forma caso sejam adicionados novas situações
            $restrito = true;
        } else {
            $restrito = false;
        }

        if ($restrito) { //economiza select
            $produtos = Produto::select('id', 'nome')->where('id', $pedido->produto)->orderBy('id', 'asc')->get();
        } else {
            $produtos = Produto::select('id', 'nome')->orderBy('id', 'asc')->get();
        }

        $selectProdutos = array();

        foreach($produtos as $produto) {
            $selectProdutos[$produto->id] = $produto->nome;
        }

        $situacoes = array();

        $arr = Pedido::situacoesPossiveis($pedido->situacao);
        foreach ($arr as $situacao) {
            $situacoes[$situacao] = Pedido::formataSituacao($situacao);
        }

        

        return view('pedidos.edit')->with('pedido', $pedido)->with('produtos', $selectProdutos)->with('situacoes', $situacoes)->with('restrito', $restrito);
    }

    /**
     * Update the specified Pedido in storage.
     *
     * @param int $id
     * @param UpdatePedidoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePedidoRequest $request)
    {
        $pedido = $this->pedidoRepository->find($id);

        if (empty($pedido)) {
            Flash::error('Pedido não encontrado.');

            return redirect(route('pedidos.index'));
        }

        $input = $request->all();

        $request->validate([
            'situacao' => [new SituacaoPedido($pedido->situacao)]
        ]);

        if ($pedido->produto == $input['produto']) {
            $request->validate([
                'qtd' => [new QuantidadeEstoque($input['produto'], $pedido->qtd)]
            ]);    
        } else {
            $request->validate([
                'qtd' => [new QuantidadeEstoque($input['produto'])]
            ]);
        }

        $pedido = $this->pedidoRepository->update($input, $id);

        Flash::success('Pedido atualizado com sucesso.');

        return redirect(route('pedidos.index'));
    }

    /**
     * Remove the specified Pedido from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pedido = $this->pedidoRepository->find($id);

        if (empty($pedido)) {
            Flash::error('Pedido não encontrado.');

            return redirect(route('pedidos.index'));
        }

        $this->pedidoRepository->delete($id);

        Flash::success('Pedido apagado com sucesso.');

        return redirect(route('pedidos.index'));
    }
}
