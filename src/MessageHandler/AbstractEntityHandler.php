<?php


namespace App\MessageHandler;


use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

abstract class AbstractEntityHandler
{
    protected EntityManagerInterface $em;

    protected LoggerInterface $logger;

    /**
     * AbstractEntityHandler constructor.
     * @param EntityManagerInterface $em
     * @param LoggerInterface $logger
     */
    public function __construct(EntityManagerInterface $em, LoggerInterface $logger)
    {
        $this->em = $em;
        $this->logger = $logger;
    }
}