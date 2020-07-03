<?php

namespace App\Service\Factory;

use Interop\Container\ContainerInterface;
use App\Service\NewsContentService;
use App\Service\MultimediaService;

class NewsContentServiceFactory {

    public function __invoke(ContainerInterface $container) {
        $em = $container->get('doctrine.entity_manager.orm_default');
        $multimediaService = $container->get(MultimediaService::class);

        return new NewsContentService($em, $multimediaService);
    }

}
