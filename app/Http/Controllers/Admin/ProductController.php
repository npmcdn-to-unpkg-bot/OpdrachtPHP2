<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use App\utils\ImageUpload;

//models
use App\Product;
use App\Category;
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
    public function store()
    {
        //return view('products.index');
    }
    public function edit($id)
    {

    }

    public function update()
    {

    }
}
