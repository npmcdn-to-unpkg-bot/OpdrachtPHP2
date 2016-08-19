<?php

namespace App\Http\Controllers\Admin;

use App\ProductCategory;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use App\utils\ImageUpload;
use Auth;
//models
use App\Product;
use App\Category;
use App\ProductImage;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('products.index');
    }

    public function show($id)
    {
        //
    }
    public function create()
    {
        $product = new Product;

        //$categories = Category::all()->lists('name', 'id')->toArray();
        $categories = Category::all()->pluck('name', 'id')->toArray();


        return view('products.create', ['product'=>$product, 'categories'=>$categories]);
    }

    public function store(Request $request)
    {

        $product = new Product();
        //product values
        $product->name = $request["name"];
        $product->title= $request["title"];
        $product->description= $request["description"];
        $product->price=$request["price"];
        $product->user_id=Auth::User()->id;

        $product->save();

        //imageupload in aparte db
        if($request->file('images') != null) {
            $files = $request->file('images');

            foreach($files as $file) {
                $imageUpload = new ImageUpload;
                $productImage= new ProductImage;

                try {
                    $imageUpload->upload($file, 'uploads/products/')->resize(290);
                    $productImage->image = $imageUpload->getFilename();
                    $productImage->product_id = $product->id;
                } catch (\Exception $e) {
                    throw $e;
                }
                $productImage->save();
            }
        }
        //einde imageupload
        //categorie toevoegen
        //tags toevoegen
        if ($request->categories != null)
        {
            //create producttag object
            $categories= $request->categories;
            foreach ($categories as $category) {
                $productcategory = new ProductCategory();
                $productcategory->product_id = $product->id;
                $productcategory->category_id = $category;
                $productcategory->save();
            }
        }


    }

    public function edit($id)
    {

    }

    public function update()
    {

    }
}
