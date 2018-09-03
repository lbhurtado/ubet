<?php
/**
 * Created by PhpStorm.
 * User: lester
 * Date: 30/08/2018
 * Time: 3:15 PM
 */

namespace App\Repositories\Eloquent;

use App\Article;
use App\Repositories\RepositoryAbstract;
use App\Repositories\Contracts\ArticleRepository;


class EloquentArticleRepository extends RepositoryAbstract implements ArticleRepository
{
    public function entity()
    {
        return Article::class;
    }
}