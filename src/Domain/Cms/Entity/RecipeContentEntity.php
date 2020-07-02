<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="recipe_contents")
 */
class RecipeContentEntity extends ContentEntity {

    public function getPathName() {
        return 'recipe';
    }

    public function getTypeId() {
        return 5;
    }

    public function getTypeName() {
        return 'receta';
    }

}
