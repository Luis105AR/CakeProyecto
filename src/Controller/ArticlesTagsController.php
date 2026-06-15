<?php
declare(strict_types=1);

namespace App\Controller;

class ArticlesTagsController extends AppController
{
    public function index()
    {
        $articlesTags = $this->fetchTable('ArticlesTags')
            ->find()
            ->all();

        $this->set(compact('articlesTags'));
    }
}