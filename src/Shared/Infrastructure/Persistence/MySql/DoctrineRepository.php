<?php

namespace MyHotels\Shared\Infrastructure\Persistence\MySql;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;

class DoctrineRepository
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    protected function entityManager(): EntityManagerInterface
    {
        return $this->entityManager;
    }

    protected function repository(string $entityClass): ObjectRepository | EntityManagerInterface
    {
        return $this->entityManager->getRepository($entityClass);
    }
}