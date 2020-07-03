<?php

namespace App\Action;

use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Expressive\Router\RouterInterface;
use App\Service\NewsContentService;
use App\Service\UserService;

class AdminNewsPageAction extends AdminContentPageAction {

    protected $key = 'news';
    protected $templateName = 'app::admin-news-page';

    public function __construct(TemplateRendererInterface $template = null, RouterInterface $router = null, NewsContentService $ncs = null, UserService $userService = null) {
        $this->template = $template;
        $this->router = $router;
        $this->userService = $userService;
        $this->contentService = $ncs;
    }

}
