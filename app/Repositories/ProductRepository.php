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
    public function findByIndex($query, $request)
    {
        if(isset($request['searchString'])) {
            $query->where('name', 'like', '%'.$request['searchString'].'%');
        }

        if (isset($request['priceRange'])) {
            $priceRange = preg_split('/ - /', $request['priceRange']);
            $query->whereBetween('price', [ltrim($priceRange[0], '$'), ltrim($priceRange[1], '$')]);
        }

        if (isset($request['brand'])) {
            $query->whereIn('brand_id', $request['brand']);
        }

        if (isset($request['sort'])) {
            if ($request['sort'] == 'date'){
                $query = $query->orderBy('created_at');
            } elseif ($request['sort'] == 'name'){
                $query = $query->orderBy('name');
            } elseif ($request['sort'] == 'price'){
                $query = $query->orderBy('price');
            } else {
                $query = $query->orderBy('id');
            }
        }

        return $query;
    }

}
