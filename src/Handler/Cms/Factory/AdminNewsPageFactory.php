<?php

namespace App\Action\Factory;

use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Expressive\Router\RouterInterface;
use App\Action\AdminNewsPageAction;
use App\Service\NewsContentService;
use App\Service\UserService;

class AdminNewsPageFactory {

    public function __invoke(ContainerInterface $container) {
        $user = $container->get(UserService::class);
        $ncs = $container->get(NewsContentService::class);
        $router   = $container->get(RouterInterface::class);
        $template = $container->get(TemplateRendererInterface::class);

        return new AdminNewsPageAction($template, $router, $ncs, $user);
    }

}
