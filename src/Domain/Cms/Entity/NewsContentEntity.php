<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Domain\Finances\Repository\TransactionRepository")
 * @ORM\Table(name="news_contents")
 */
class NewsContentEntity extends ContentEntity {

    public function getPathName() {
        return 'new';
    }

    public function getTypeId() {
        return 1;
    }

    public function getTypeName() {
        return 'noticia';
    }

}
