<?php


namespace App\Forum\Action\User;


use App\Forum\Domain\User\Entity\UserEntity;

class NotifyToAdminByEmailService
{

    public function __construct()
    {
    }

    public function handle(UserEntity $userEntity)
    {
        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        $output->writeln("<info>" . __CLASS__ . ' executed...' . "</info>");
    }
}