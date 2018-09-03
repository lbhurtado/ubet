<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Repositories\Contracts\{
    UserRepository,
    ArticleRepository
};
use App\Repositories\Eloquent\Criteria\HasImage;
use App\Repositories\Eloquent\Criteria\LatestFirst;


class ArticleController extends Controller
{
    protected $articles;

    protected $users;

    public function __construct(ArticleRepository $articles, UserRepository $users)
    {
        $this->articles = $articles;

        $this->users = $users;
    }

    public function index()
    {
//        $articles = $this->articles->withCriteria(new LatestFirst())->all();

        $articles = $this->articles->withCriteria(new LatestFirst(), new HasImage())->all();

        return view('articles.index', compact('articles'));
    }

    public function show($unique_id)
    {

//        $article = $this->articles->withCriteria(new HasImage())->find(999);
        $article = $this->articles->withCriteria(new HasImage())->findWhereFirst('unique_id', $unique_id);

        return view('articles.show', compact('article'));
    }
}
