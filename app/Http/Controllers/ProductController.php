<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use \App\Product;
use \App\Feature;
use \App\Category;
use \App\Media;
use \App\Http\Requests\StoreProductInfo;
use Purifier;

class ProductController extends Controller
{


  protected $repository;

  public function __construct(ProductRepository $repository)
  {
    $this->repository  = $repository;
    $this->middleware('auth')->except('index');
  }

    //
  public function index() {
   $products=$this->repository->getItems();
   return view('products.index',compact('products'));
 }

 public function create() {
   $categories= $this->repository->getCategories();
   return view('products.create',compact('categories'));
 }


    // for editing the product
 public function edit(Product $product) {
   $categories= $this->repository->getCategories();
   return view('products.edit',compact(['product','categories']));
 }

    // for searching the products
 public function search() {
  $products=$this->repository->searchProduct(request(['fromPrice','toPrice','fromDate','toDate','search']));
  return view('products.index',compact('products'));
}

public function store(StoreProductInfo $request) {
  $this->repository->saveProduct($request);
  return redirect()->route('product.index');
}

public function update(StoreProductInfo $request,Product $product) {
 $this->repository->updateProduct($request,$product);
 return redirect()->route('product.index');
}


public function destroy($id) {
  $product=Product::find($id);
  $feature=Feature::find($product->feature->id);
  $feature->delete();
  $product->delete();
  return redirect()->route('product.index');
}

}
