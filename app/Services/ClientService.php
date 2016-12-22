<?php
namespace CodeDelivery\Services;
use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Repositories\UserRepository;

class ClientService
{
    /**
     * @var ClientRepository
     */
    private $clientRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;
    public function __construct(ClientRepository $clientRepository, UserRepository $userRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->userRepository = $userRepository;
    }
    public function update(array $data, $id)
    {
        /*Altera os dados da tabela cliente*/
        $this->clientRepository->update($data, $id);
        /*Pega o user_id do cliente*/
        $userId = $this->clientRepository->find($id)->user_id;
        /*Altera os dados referente a tabela User*/
        $this->userRepository->update($data['user'],$userId );
    }
    public function create(array $data)
    {
        $data['user']['password'] = bcrypt(123456);
        $user = $this->userRepository->create($data['user']);
        $data['user_id'] = $user->id;
        $this->clientRepository->create($data);
    }
}