<?php


namespace App\Forum\Action\User;


use App\Forum\Domain\User\Model\RegisterUserObject;
use App\Forum\Domain\User\Repository\UserRepository;
use App\Forum\Domain\User\Service\RegisterUserService;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class RegisterUserAction
{
    /**
     * @var RegisterUserService
     */
    private $registerUser;
    /**
     * @var NotifyUserByEmailService
     */
    private $notifyUserByEmail;
    /**
     * @var NotifyToAdminByEmailService
     */
    private $notifyToAdminByEmail;
    /**
     * @var UserRepository
     */
    private $userRepository;


    /**
     * RegisterUserAction constructor.
     * @param RegisterUserService $registerUser
     * @param NotifyUserByEmailService $notifyUserByEmail
     * @param NotifyToAdminByEmailService $notifyToAdminByEmail
     */
    public function __construct(RegisterUserService $registerUser,
                                NotifyUserByEmailService $notifyUserByEmail,
                                NotifyToAdminByEmailService $notifyToAdminByEmail
    )
    {
        $this->registerUser = $registerUser;
        $this->notifyUserByEmail = $notifyUserByEmail;
        $this->notifyToAdminByEmail = $notifyToAdminByEmail;
        $this->userRepository = $userRepository;
    }


    public function __invoke(Request $request)
    {
        $data = $request->except('_token');


//        return $this->userRepository->all();
        $user = new RegisterUserObject('nima', 'secret');
        $userEntity = $this->registerUser->handle($user);
        $this->notifyUserByEmail->handle($userEntity);
        $this->notifyToAdminByEmail->handle($userEntity);
    }
}