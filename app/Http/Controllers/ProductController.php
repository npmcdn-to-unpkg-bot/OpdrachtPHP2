<?php


namespace App\Http\Controllers;

use App\ProductCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use App\utils\ImageUpload;
use Auth;
//models
use App\Product;
use App\Category;
use App\ProductImage;
use App\Favorite;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //alle zoekertjes op homepage!
    public function index()
    {
        $products=Product::getAllSorted();
        return view('welcome',['products'=>$products]);

    }

    public function show($id)
    {
        $productdetails = Product::findById($id);
        $username=User::getUserName($productdetails->user_id);

        $categoryname= Category::findCatName($productdetails->category_id);


        $checkfavorited=Favorite::findByUserId($id);

        if($checkfavorited!=null){

            $checked=1;
        }
        else
        {
            $checked=0;
        }
        //get images
        $images=ProductImage::GetAllProductImages($id);
        return view('products.detail', ['productdetails'=>$productdetails, "categoryname"=>$categoryname, "username"=>$username, "images"=>$images, "checked"=>$checked]);
    }

}
