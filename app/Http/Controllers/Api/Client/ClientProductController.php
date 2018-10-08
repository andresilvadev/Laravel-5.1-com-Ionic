<?php

namespace CodeDelivery\Http\Controllers\Api\Client;

use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Http\Controllers\Controller;

class ClientProductController extends Controller
{
    /**
     * @var ProductRepository
     */
    private $productRepository;


    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $products = $this->productRepository
            ->skipPresenter(false)
            ->all();

        return $products;
    }

}
