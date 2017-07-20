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
use Illuminate\Http\Request;
use Purifier;


class ProductRepository
{
    protected $model;
    protected $category;

    public function __construct(Product $product, Category $category)
    {
        $this->model = $product;
        $this->category = $category;
    }


    public function getItems()
    {
        return $this->model->orderBy('id', 'desc')->with('feature', 'category')->paginate(10);
    }

    public function getCategories()
    {
        return $this->category->all();
    }

    public function searchProduct(array $data)
    {
        $toPrice = array_get('$data','toPrice');
        $fromPrice=array_get('$data','fromPrice');
        $fromDate=array_get('$data','fromDate');
        $toDate=array_get('$data','toDate');
        $term=array_get('$data','search');
        //$fromDate = request('fromDate');
       // $toDate = request('toDate');
        //$term = request('search');
        //$fromPrice = request('fromPrice');
        //$toPrice = request('toPrice');

        $query = (new Product)->newQuery();

        // searching
        if ($term) {
            $query->where('name', 'LIKE', '%' . $term . '%');
        }

        if ($fromDate && $toDate) {
            $query->whereBetween('created_at', array($fromDate, $toDate));
        }

        if ($fromPrice && $toPrice) {
            $query->whereBetween('price', array($fromPrice, $toPrice));
        }

        $products = $query->with('feature', 'category')->paginate(10);
        return $products;
    }

    public function saveProduct()
    {
        $data = request(['name', 'discountPrice', 'category_id', 'price', 'description', 'information', 'brand']);
        // Purify the data
        $data['description'] = Purifier::clean(request('description'));
        $product = Product::create($data);
        $product->feature()->create(request(['size', 'color', 'weight']));

        if (request()->hasFile('images')) {
            foreach (request()->file('images') as $image) {
                $this->saveImage($product, new Media, $image);
            }
        }

        if (request()->hasFile('featureImage')) {
            $image = request()->file('featureImage');
            $media = new Media;
            $media->feature = "yes";
            $this->saveImage($product, $media, $image);
        }
    }

    public function updateProduct(Request $request, Product $product)
    {
        $data = request(['name', 'discountPrice', 'category_id', 'price', 'description', 'information', 'brand']);
        $data['description'] = Purifier::clean(request('description'));
        $product->update($data);
        $product->feature()->update(request(['size','color','weight']));

        /**
         * if($request->hasFile('images')) {
         * foreach($request->file('images') as $image) {
         * //$image=$request->file('image');
         * $destinationPath=public_path('/uploads/products/');
         * $fileName=time() . '.' . $image->getClientOriginalExtension();
         * $image->move($destinationPath,$fileName);
         * //$product->image_path=$fileName;
         * $media=new Media;
         * $media->caption="info";
         * $media->path=$fileName;
         * $media->alt=$request->name;
         * $product->medias()->save($media);
         * }
         * }
         **/
    }

    public function saveImage(Product $product, Media $media, $image)
    {
        $destinationPath = public_path('/uploads/products/');
        $fileName = time() . '.' . $image->getClientOriginalExtension();
        $image->move($destinationPath, $fileName);
        $media->caption = "info";
        $media->path = $fileName;
        $media->alt = $product->name;
        $product->medias()->save($media);
    }

}