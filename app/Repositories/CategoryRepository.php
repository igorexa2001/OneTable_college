<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;


class CategoryRepository
{

    /**
     * @return Category[]|Collection
     */
    public function findAll()
    {
        return Category::all();
    }

    /**
     * @return Category[]|Collection
     */
    public function findPopular()
    {
        return Category::where('is_popular', 1)->get();
    }

    /**
     * Все родительские категории
     *
     * @return mixed
     */
    public function findParents()
    {
        return Category::whereNull('category_id');
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function findBySlug($slug)
    {
        return Category::where('slug', $slug)->first();
    }

    /**
     * Для меню
     *
     * @return mixed
     */
    public function categoriesMenu()
    {
        return Category::all();
    }
}
