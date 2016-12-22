<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 21/12/2016
 * Time: 14:56
 */
namespace CodeDelivery\Services;
use CodeDelivery\Repositories\CupomRepository;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use Illuminate\Support\Facades\DB;
class OrderService
{
    /**
     * @var OrderRepository
     */
    private $orderRepository;
    /**
     * @var CupomRepository
     */
    private $cupomRepository;
    /**
     * @var ProductRepository
     */
    private $productRepository;
    public function __construct(OrderRepository $orderRepository, CupomRepository $cupomRepository, ProductRepository $productRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->cupomRepository = $cupomRepository;
        $this->productRepository = $productRepository;
    }
    public function create(array $data)
    {
        //Inicia uma transação com o banco
        DB::beginTransaction();

        try{
            $data['status'] = 0;
            // Evitar que o usuário envie diretamente um cupom_id
            if( isset($data['cupom_id']) ){
                unset($data['cupom_id']);
            }

            // Verifica se existe cupom
            if(isset($data['cupom_code'])){
                $cupom = $this->cupomRepository->findByField('code', $data['cupom_code'])->first();
                $data['cupom_id'] = $cupom->id;
                $cupom->used = 1;
                $cupom->save();
                unset($data['cupom_code']);
            }

            $items = $data['items'];
            unset($data['items']);

            $order = $this->orderRepository->create($data);
            $total = 0;

            foreach ($items as $item){
                //Busca o product_id e pega o preço do produto
                $item['price'] = $this->productRepository->find($item['product_id'])->price;

                //Adicionando o item na ordem de serviço
                $order->items()->create($item);


                $total += $item['price'] * $item['qtd'];
            }

            $order->total = $total;

            //Se existir cupom de desconto, ordem total desconta o valor do cupom
            if(isset($cupom)){
                $order->total = $total - $cupom->value;
            }

            $order->save();

            //Realiza o commit no banco
            DB::commit();

            return $order;

            //Se acontecer algum erro, da um rollback e mostra a exceção
        }catch (\Exception $e){
            DB::rollBack();;
            throw $e;
        };
    }
}