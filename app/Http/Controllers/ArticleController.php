<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleRepository;
use App\Repositories\CategoryRepository;

class ArticleController extends Controller
{
    /**
     * @var ArticleRepository
     * @var CategoryRepository
     */
    private $articleRepository;
    private $categoryRepository;

    /**
     * ArticleController constructor.
     * @param ArticleRepository $articleRepository
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(ArticleRepository $articleRepository, CategoryRepository $categoryRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('blog.blog', [
            'categories' => $this->categoryRepository->categoriesMenu(),
            'articles' => $this->articleRepository->findAll(),
        ]);
    }

    /**
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(string $slug)
    {
        return view('blog.blog_single', [
            'categories' => $this->categoryRepository->categoriesMenu(),
            'articles' => $this->articleRepository->findRandom($slug),
            'article' => $this->articleRepository->findBySlug($slug),
        ]);
    }
}
