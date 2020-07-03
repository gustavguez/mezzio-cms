<?php

namespace App\Service;

use App\Entity\NewsContentEntity;

class NewsContentService extends ContentService {

    protected $class = NewsContentEntity::class;
    protected $multimediaFolder = 'news';

}
