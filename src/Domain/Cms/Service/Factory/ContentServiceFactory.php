<?php

declare(strict_types=1);

namespace Gustavguez\LaminasCms\Domain\CMS\Service\Factory;

use Psr\Container\ContainerInterface;
use Gustavguez\LaminasCms\Domain\CMS\Entity\ContentEntity;
use Gustavguez\LaminasCms\Domain\CMS\Service\ContentService;

class ContentServiceFactory
{
    public function __invoke(ContainerInterface $container) : ContentService
    {
        $em = $container->get('doctrine.entity_manager.orm_default');
        return new ContentService($em, ContentEntity::class);
    }
}
