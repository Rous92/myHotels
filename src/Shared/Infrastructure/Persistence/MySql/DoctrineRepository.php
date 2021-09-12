<?php

namespace MyHotels\Shared\Infrastructure\Persistence\MySql;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use MyHotels\Shared\Domain\Model\Entity;

class DoctrineRepository
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    protected function entityManager(): EntityManagerInterface
    {
        return $this->entityManager;
    }

    protected function repository(string $entityClass): ObjectRepository|EntityManagerInterface
    {
        return $this->entityManager->getRepository($entityClass);
    }

    protected function persist(Entity $entity): void
    {
        $this->entityManager()->persist($entity);
        $this->entityManager()->flush($entity);
    }
}
