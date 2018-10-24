<?php


namespace App\Forum\Domain\User\Service;


use App\Forum\Domain\User\Model\RegisterUserObject;
use App\Forum\Domain\User\Repository\UserRepository;
use Illuminate\Hashing\BcryptHasher;

class RegisterUserService
{

    /**
     * @var BcryptHasher
     */
    private $hasher;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * RegisterUserService constructor.
     * @param BcryptHasher $hasher
     * @param UserRepository $userRepository
     */
    public function __construct(BcryptHasher $hasher, UserRepository $userRepository)
    {
        $this->hasher = $hasher;
        $this->userRepository = $userRepository;
    }


    /**
     * Handle logic in service.
     *
     * @param RegisterUserObject $user
     * @return mixed
     * @throws \nimaebrazi\LaravelRepository\Repository\LaravelRepositoryCreateException
     */
    public function handle(RegisterUserObject $user)
    {
        $data = [
            'username' => $user->getUsername(),
            'password' => $this->hasher->make($user->getPassword())
        ];

//        dd($data);
        return $this->userRepository->create($data);
    }
}