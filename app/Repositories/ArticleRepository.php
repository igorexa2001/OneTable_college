<?php

namespace App\Repositories;

use App\Models\Article;


class ArticleRepository
{

    /**
     * @return Article[]|\Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        return Article::all();
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function findBySlug($slug)
    {
        return Article::where('slug', $slug)->first();
    }

    /**
     * Нахождение трех случайных статей
     *
     * @param null $slug
     * @return mixed
     */
    public function findRandom($slug = null)
    {
        return Article::where('slug', '!=', $slug)->get()->random(3);
    }
}
