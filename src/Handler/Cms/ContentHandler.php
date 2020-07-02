<?php

declare(strict_types=1);

namespace Gustavguez\LaminasCms\Handler\CMS;

use Gustavguez\LaminasCms\Domain\Api\Common\BaseHandler;
use Gustavguez\LaminasCms\Domain\Api\Response\ApiResponseEntity;
use Psr\Http\Message\ServerRequestInterface;

class ContentHandler extends BaseHandler
{

    public function get(ServerRequestInterface $request): ApiResponseEntity
    {
        $id = $request->getAttribute('id');

        //Check individual get
        if(!empty($id)){
            return new ApiResponseEntity(
                $this->service->getEntity($id)
            );
        }

        return new ApiResponseEntity(
            $this->service->getCollection()
        );
    }

    public function post(ServerRequestInterface $request): ApiResponseEntity
    {
        $data = $request->getParsedBody();
        return new ApiResponseEntity(
            $this->service->addEntity($data)
        );
    }

    public function put(ServerRequestInterface $request): ApiResponseEntity
    {
        $id = $request->getAttribute('id');
        $data = $request->getParsedBody();
        return new ApiResponseEntity(
            $this->service->editEntity($id, $data)
        );
    }

    public function delete(ServerRequestInterface $request): ApiResponseEntity
    {
        $id = $request->getAttribute('id');
        return new ApiResponseEntity(
            $this->service->deleteEntity($id)
        );
    }
}
