<?php


namespace App\Http\Controllers;

use App\ProductCategory;
use App\User;
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
    //alle zoekertjes op homepage!
    public function index()
    {
        //return view('products.index');
    }

    public function show($id)
    {
        $productdetails = Product::findById($id);
        $username=User::getUserName($productdetails->user_id);
        $catid=ProductCategory::findProductCatId($id);


        $categoryname= Category::findCatName($catid->category_id);

        //get images
        $images=ProductImage::GetAllProductImages($id);
        return view('products.detail', ['productdetails'=>$productdetails, "categoryname"=>$categoryname, "username"=>$username, "images"=>$images]);
    }

}
