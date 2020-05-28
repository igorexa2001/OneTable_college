<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;


class ProductRepository
{

    /**
     * @return Product[]|Collection
     */
    public function findAll()
    {
        return Product::all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return Product::where('id', $id)->first();
    }

    /**
     * @return Product[]|Collection
     */
    public function findNew()
    {
        return Product::where('is_new', '1')->get();
    }

    /**
     * @return Product[]|Collection
     */
    public function findSale()
    {
        return Product::where('is_sale', '1')->get();
    }

    /**
     * @return Product[]|Collection
     */
    public function findRecommended()
    {
        return Product::where('is_recommend', '1')->get();
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function findBySlug($slug)
    {
        return Product::where('slug', $slug)->first();
    }

    /**
     * Фильтрация
     *
     * @param $query
     * @param $param
     * @return mixed
     */
    public function findByIndex($query, $param)
    {
        if(isset($param['searchString'])) {
            $query->where('name', 'like', '%'.$param['searchString'].'%');
        }

        if (isset($param['priceRange'])) {
            $priceRange = preg_split('/ - /', $param['priceRange']);
            $query->whereBetween('price', [ltrim($priceRange[0], '$'), ltrim($priceRange[1], '$')]);
        }

        if (isset($param['brand'])) {
            $query->whereIn('brand_id', $param['brand']);
        }

        if (isset($param['sort'])) {
            if ($param['sort'] == 'date'){
                $query = $query->orderBy('created_at');
            } elseif ($param['sort'] == 'name'){
                $query = $query->orderBy('name');
            } elseif ($param['sort'] == 'price'){
                $query = $query->orderBy('price');
            } else {
                $query = $query->orderBy('id');
            }
        }

        return $query;
    }

}
