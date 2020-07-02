<?php

declare(strict_types=1);

namespace Gustavguez\LaminasCms\Domain\Api\Common;

use Doctrine\ORM\EntityManager;
use Exception;

class BaseService
{
    
    protected $entityManager;
    protected $entityRepository;

    public function __construct(
        EntityManager $entityManager,
        string $entityName
    ){
        $this->entityManager = $entityManager;
        $this->entityRepository = $entityManager->getRepository($entityName);
    }

    public function getEntity($id){
        $entity = $this->entityRepository->find($id);

        //Check empty
        if(empty($entity)){
            throw new Exception('Not found', 404);
        }

        return $entity;
    }

    public function findEntity($query){
        $entity = $this->entityRepository->findBy($query);

        //Check empty
        if(empty($entity[0])){
            throw new Exception('Not found', 404);
        }

        return $entity[0];
    }

    public function addEntity($data){
       throw new Exception('Method not implemented', 405);
    }

    public function editEntity($id, $data){
        throw new Exception('Method not implemented', 405);
    }

    public function deleteEntity($id){
        $entity = $this->entityRepository->find($id);

        //Check empty
        if(empty($entity)){
            throw new Exception('Not found', 404);
        }

        //Remove
        $this->entityManager->remove($entity);
        $this->entityManager->flush();

        return true;
    }

    public function getCollection($params = NULL){
        if(!empty($params)){
            return $this->entityRepository->findBy($params);
        }
        return $this->entityRepository->findAll();
    }
}
