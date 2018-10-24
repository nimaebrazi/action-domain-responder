<?php


namespace App\Forum\Action\User;


use App\Forum\Domain\User\Entity\UserEntity;
use Illuminate\Contracts\Events\Dispatcher as Event;

class NotifyUserByEmailService
{
    /**
     * @var Event
     */
    private $event;

    /**
     * NotifyUserByEmailService constructor.
     * @param Event $event
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    public function handle(UserEntity $userEntity)
    {
        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        $output->writeln("<info>" . __CLASS__ . ' executed...' . "</info>");
    }
}