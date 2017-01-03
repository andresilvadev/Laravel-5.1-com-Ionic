<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\UserRepository;
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class UsersController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return $this->userRepository->all();
    }

    public function authenticated()
    {
        $userId = Authorizer::getResourceOwnerId();
        $user = $this->userRepository->find($userId);
        return $user;
    }
}
