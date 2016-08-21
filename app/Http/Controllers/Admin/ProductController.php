<?php

namespace App\Http\Controllers\Admin;


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
use App\ProductCategory;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { //overzicht van zoekertjes van de gebruiker.
        //ophalen userid
        $user_id = Auth::User()->id;

        $userproducts= Product::ProductsFromUser($user_id);


        return view('profile.myproducts', ['userproducts'=>$userproducts]);
    }

    public function show($id)
    {

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
        $product->category_id=$request->categories['0'] ;
        $product->save();

        //imageupload in aparte db
        if($request->file('images')['0'] != 0)  {
            $files = $request->file('images');

            foreach($files as $file) {
                $imageUpload = new ImageUpload;
                $productImage= new ProductImage;

                try {
                    $imageUpload->upload($file, 'uploads/products/')->resize(350);
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
        /*
               if ($request->categories != null)

                   /*
                   //create producttag object
                   $categories= $request->categories;
                   foreach ($categories as $category) {
                       $productcategory = new ProductCategory();
                       $productcategory->product_id = $product->id;
                       $productcategory->category_id = $category;
                       $productcategory->save();
                   }
        }*/
       $linkid= $product->id;

        //nog een return pagina fixen ->laten terugkeren naar show zoekertje
        return redirect()->route('products.detail', ['id' => $linkid]);
    }

    public function edit($product_id)
    {
        $product = Product::find($product_id);

        //populate dropdown
        $categories = Category::all()->pluck('name', 'id')->toArray();
        //selected item voor placeholder
        $selected= $product->category_id;

        return view('products.edit', ['product'=>$product, 'categories'=>$categories, 'selected'=>$selected]);
    }

    public function update(Request $request, $product_id)
    {
        $product = Product::find($product_id);

        //product values
        $product->name = $request["name"];
        $product->title= $request["title"];
        $product->description= $request["description"];
        $product->price=$request["price"];
        $product->category_id=$request->categories['0'] ;
        $product->save();

        //categoriee
        /*
        if ($request->categories != null)
        {
            $categories= $request->categories;
            foreach ($categories as $category) {
                $productcategory = ProductCategory::findCatRelation($product_id);
                $productcategory->category_id = $category;
                $productcategory->save();
            }
        }*/
        //change images
        //imageupload als er geen nieuwe geselecteerd zijn.

        if($request->file('images')['0'] != 0) {

            //bestaande images zoeken en verwijderen
$deleteimages=ProductImage::GetAllProductImages($product_id);

            foreach($deleteimages as $delete)
            {
                $delete->delete();
            }


            $files = $request->file('images');
            foreach($files as $file) {
                $imageUpload = new ImageUpload;
                $productImage= new ProductImage;

                try {
                    $imageUpload->upload($file, 'uploads/products/')->resize(350);
                    $productImage->image = $imageUpload->getFilename();
                    $productImage->product_id = $product->id;
                } catch (\Exception $e) {
                    throw $e;
                }
                $productImage->save();
            }
        }
        //einde imageupload
        $message = $product->name.' is aangepast';
        return redirect()->route('user.products.index')->with('messages.warning',$message);
    }

    public function destroy(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Get name early -> after deletion name is already gone!
        $name = $product->name;

        $product->delete();

        $message = $name.' is verwijdert.';
        return redirect()->route('user.products.index')->with('messages.warning',$message);
    }
}
