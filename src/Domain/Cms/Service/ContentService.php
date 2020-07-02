<?php

declare(strict_types=1);

namespace Gustavguez\LaminasCms\Domain\CMS\Service;

use Gustavguez\LaminasCms\Domain\Api\Common\BaseService;
use Gustavguez\LaminasCms\Domain\CMS\Entity\ContentEntity;

class ContentService extends BaseService
{

    public function addEntity($data){
        //Creates content obj
        $content = new ContentEntity($data['name']);
        
        //Persis 
        $this->entityManager->persist($content);
        $this->entityManager->flush();

        //Returns 
        return $content;
     }
 
     public function editEntity($id, $data){
        $entity = $this->entityRepository->find($id);

        //Check empty
        if(empty($entity)){
            throw new Exception('Not found', 404);
        }

        //Update
        $entity->setName($data['name']);

        //Remove
        $this->entityManager->flush();

        return $entity;
     }
    
}
