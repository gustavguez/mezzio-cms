<?php

namespace App\Action\Factory;

use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;
use App\Action\NewsPageAction;
use App\Service\NewsContentService;

class NewsPageFactory {

    public function __invoke(ContainerInterface $container) {
        $ncs = $container->get(NewsContentService::class);
        $template = $container->get(TemplateRendererInterface::class);

        return new NewsPageAction($template, $ncs);
    }

}
