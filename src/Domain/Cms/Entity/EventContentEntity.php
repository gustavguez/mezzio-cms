<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="event_contents")
 */
class EventContentEntity extends ContentEntity {

    public function getPathName() {
        return 'event';
    }

    public function getTypeId() {
        return 7;
    }

    public function getTypeName() {
        return 'evento';
    }

}
