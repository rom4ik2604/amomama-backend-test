<?php


namespace App\MessageHandler;


use App\Message\SaveClient;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class SaveClientHandler extends AbstractEntityHandler implements MessageHandlerInterface
{
    public function __invoke(SaveClient $message)
    {
        try {
            $this->em->persist($message->getClient());
            $this->em->flush();
        } catch (\Throwable $throwable) {
            $this->logger->error($throwable->getMessage(), $message->getClient()->jsonSerialize());
        }
    }
}