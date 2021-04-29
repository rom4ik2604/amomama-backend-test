<?php


namespace App\MessageHandler;


use App\Message\SaveClient;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

/**
 * Class SaveClientHandler
 * @package App\MessageHandler
 */
class SaveClientHandler extends AbstractEntityHandler implements MessageHandlerInterface
{
    /**
     * @param SaveClient $message
     */
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