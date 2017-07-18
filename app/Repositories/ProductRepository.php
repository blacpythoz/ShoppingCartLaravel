<?php
/**
 * Created by PhpStorm.
 * User: Amar
 * Date: 7/18/2017
 * Time: 10:12 AM
 */

namespace App\Repositories;


use App\Category;
use App\Product;

class ProductRepository
{
    protected $model;
    protected $category;
    public function __construct(Product $product, Category $category)
    {
        $this->model = $product;
        $this->category = $category;
    }


    public function getItems(){
        return $this->model->orderBy('id','desc')->paginate(10);
    }

    public function getCategories(){
        return $this->category->all();
    }



}