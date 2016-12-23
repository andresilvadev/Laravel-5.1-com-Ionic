<?php

namespace CodeDelivery\Http\Controllers\Api\Client;

use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class ClientCheckoutController extends Controller
{

    /**
     * @var OrderRepository
     */
    private $orderRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var OrderService
     */
    private $orderService;


    public function __construct(OrderRepository $orderRepository, UserRepository $userRepository, ProductRepository $productRepository, OrderService $orderService)
    {
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
        $this->orderService = $orderService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Authorizer::getResourceOwnerId();

        $clientId = $this->userRepository->find($id)->client->id;

        //Buscando todas as ordens do cliente que estiver logado -> E incluir um with para acrencentar a relacao de itens na consulta
        $orders = $this->orderRepository->with(['items'])->scopeQuery(function($query) use($clientId){
            return $query->where('client_id', '=', $clientId);
        })->paginate();

        return $orders;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all(); // Variavel data armazenda todos os campos da request
        $id = Authorizer::getResourceOwnerId(); // Pega o id do usuario que acessa a api
        $clientId = $this->userRepository->find($id)->client->id; //Busca o cliente pelo id do usuário
        $data['client_id'] = $clientId; // Campo client_id da request armazena o id do client
        $object = $this->orderService->create($data); // Cria uma nova ordem passando o $data
        $object = $this->orderRepository->with(['items'])->find($object->id); // Consulta a order com os itens inclusos

        return $object;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "Minha order";
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
