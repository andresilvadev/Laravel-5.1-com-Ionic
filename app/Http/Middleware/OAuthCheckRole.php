<?php

namespace CodeDelivery\Http\Middleware;

use Closure;
use CodeDelivery\Repositories\UserRepository;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class OAuthCheckRole
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * OAuthCheckRole constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $id = Authorizer::getResourceOwnerId(); //Authorizer getResourceOwnerId recupera o id do usuario autenticado na api
        $user = $this->userRepository->find($id); //Consulta o usuário

        if($user->role != $role){ //Verifica se a role for diferente
            abort(403, 'Access Forbidden') ;
        }

        return $next($request);
    }
}
