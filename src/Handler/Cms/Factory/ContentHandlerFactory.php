<?php

declare(strict_types=1);

namespace Gustavguez\LaminasCms\Handler\Finances\Factory;

use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Gustavguez\LaminasCms\Domain\Finances\Service\ContentService;
use Gustavguez\LaminasCms\Handler\Finances\ContentHandler;

class ContentHandlerFactory
{
    public function __invoke(ContainerInterface $container) : RequestHandlerInterface
    {
        $contentService = $container->get(ContentService::class);
        return new ContentHandler($contentService);
    }
}
