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
use App\Media;
use App\Feature;
use App\Order;
use Illuminate\Http\Request;
use Purifier;


class OrderRepository
{
    protected $order;
    protected $category;
    public function __construct(Order $order, Category $category)
    {
        $this->model = $order;
        $this->category = $category;
    }


    public function getItems(){
        return $this->model->orderBy('id','desc')->paginate(10);
    }

    public function getCategories(){
        return $this->category->all();
    }

    public function searchProduct(Request $request) {
             //dd($request->all());
        $fromDate=$request->fromDate;
        $toDate=$request->toDate;
        $term=$request->search;
        $fromPrice=$request->fromPrice;
        $toPrice=$request->toPrice;

        $query = (new Product)->newQuery();

        // searching 
        if($term) {
           $query->where('name','LIKE','%'.$term.'%');
       }

       if($fromDate && $toDate) {
           $query->whereBetween('created_at', array($fromDate, $toDate));
       }

       if($fromPrice && $toPrice) {
           $query->whereBetween('price', array($fromPrice, $toPrice));
       }

       $products=$query->paginate(10);
       return $products;
   }


}