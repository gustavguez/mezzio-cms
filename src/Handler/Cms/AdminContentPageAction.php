<?php

namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Expressive\Router\RouterInterface;
use App\Service\UserService;
use JsonSerializable;

class AdminContentPageAction {

    protected $contentService;
    protected $template;
    protected $router;
    protected $userService;
    protected $key;
    protected $templateName;

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null) {
        $data = [
            'userName' => [],
            'error' => ''
        ];

        //Init data array
        $data[$this->key] = [];

        //Get user session
        $user = $this->userService->loadSesion();
        $method = $request->getMethod();
        $queryParams = $request->getQueryParams();

        //User check
        if (empty($user) || empty($user['userName'])) {
            //Redirect admin
            return new RedirectResponse($this->router->generateUri('admin'));
        } else {
            //Set username
            $data['userName'] = $user['userName'];
        }

        //Data process
        if ($method === 'DELETE') {
            $this->contentService->deleteContent($queryParams['id']);
        } else if ($method === 'POST') {
            $uploadFiles = $request->getUploadedFiles();
            $payload = $request->getParsedBody();

            if ((int) $payload['id'] > 0) { //Update
                $this->contentService->updateContent($payload, $uploadFiles);
            } else { //Add
                $this->contentService->addContent($payload, $uploadFiles, $user['id']);
            }
        }

        //Search contents
        $contents = $this->contentService->fetchAll(array(), array('id' => 'DESC'));

        if (!empty($contents)) {
            foreach ($contents as $content) {
                if ($content instanceof JsonSerializable) {
                    $data[$this->key][] = $content->jsonSerialize();
                }
            }
        }

        return new HtmlResponse($this->template->render($this->templateName, $data));
    }

}
