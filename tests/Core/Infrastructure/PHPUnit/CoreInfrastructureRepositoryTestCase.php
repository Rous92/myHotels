<?php

namespace MyHotels\Tests\Core\Infrastructure\PHPUnit;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\SchemaTool;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CoreInfrastructureRepositoryTestCase extends KernelTestCase
{
    protected ?EntityManager $entityManager = null;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->entityManager = $this->entityManager ?: $kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        // Runs the schema update tool using our entity metadata
        $metadata = $this->entityManager->getMetadataFactory()->getAllMetadata();
        $schemaTool = new SchemaTool($this->entityManager);
        $schemaTool->updateSchema($metadata);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        $this->entityManager->close();
        $this->entityManager = null;
    }
}
