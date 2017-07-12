<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;
use \App\Feature;

class ProductController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    //
    public function index() {
    	$products=Product::all();
    	return view('products.index',compact('products'));
    }

    public function create() {
    	return view('products.create');
    }
    public function edit($id) {
        $product = Product::find($id);
        return view('products.edit',compact('product'));
    }

    public function search(Request $request) {
        //dd($request->all());
        $fromDate=$request->fromDate;
        $toDate=$request->toDate;
        $term=$request->search;
        $fromPrice=$request->fromPrice;
        $toPrice=$request->toPrice;

        $query = (new Product)->newQuery();

        if($term) {
           $query->where('name','LIKE','%'.$term.'%');
        }

        if($fromDate && $toDate) {
           $query->whereBetween('created_at', array($fromDate, $toDate));
        }

        if($fromPrice && $toPrice) {
           $query->whereBetween('price', array($fromPrice, $toPrice));
        }

        $products=$query->get();

       return view('products.index',compact('products'));
   }

    public function store(Request $request) {

    	$this->validate($request,[
    		'name'=>'required',
    		'discount'=>'required',
    		'price'=>'required',
    		'size'=>'required',
    		'color'=>'required',
    		'weight'=>'required',
    		]);

    	$product = new Product;
    	$product->name=$request->name;
    	$product->discountPrice=$request->discount;
    	$product->price=$request->price;
    	$feature = new Feature;
    	$feature->size=$request->size;
    	$feature->color=$request->color;
    	$feature->weight=$request->weight;
    	$feature->save();
    	$product->feature_id=$feature->id;

    	if($request->hasFile('image')) {
            $image=$request->file('image');
    		$destinationPath=public_path('/uploads/products/');
            $fileName=time() . '.' . $image->getClientOriginalExtension();
    		$request->file('image')->move($destinationPath,$fileName);
	    	$product->image_path=$fileName;
    	}
    	$product->save();
    	//$product->feature()->save($feature);

    	return redirect()->route('product.index');
    	//dd($request->all());
    }

    public function update(Request $request,$id) {
        //dd($request->all());

        $this->validate($request,[
            'name'=>'required',
            'discount'=>'required',
            'price'=>'required',
            'size'=>'required',
            'color'=>'required',
            'weight'=>'required',
            ]);

        $product = Product::find($id);
        $product->name=$request->name;
        $product->discountPrice=$request->discount;
        $product->price=$request->price;
        $feature = Feature::find($product->feature->id);
        $feature->size=$request->size;
        $feature->color=$request->color;
        $feature->weight=$request->weight;
        $feature->save();
        $product->feature_id=$feature->id;

        if($request->hasFile('image')) {
            $image=$request->file('image');
            $destinationPath=public_path('/uploads/products/');
            $fileName=time() . '.' . $image->getClientOriginalExtension();
            $request->file('image')->move($destinationPath,$fileName);
            $product->image_path=$fileName;
        }
        $product->save();
        //$product->feature()->save($feature);

        return redirect()->route('product.index');
        //dd($request->all());
    }
    

    public function destroy($id) {
        $product=Product::find($id);
        $feature=Feature::find($product->feature->id);
        $feature->delete();
        $product->delete();
        return redirect()->route('product.index');
    }

}
