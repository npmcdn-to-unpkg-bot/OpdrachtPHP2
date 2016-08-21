<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Product;
use App\Category;
use App\ProductImage;
use App\Favorite;

class QueryController extends Controller
{
    public function search(Request $request)
    {
        // Gets the query string from our form submission
        $keyword = Input::get('search');

        // Returns an array of articles that have the query string located somewhere within
        // our articles titles. Paginates them so we can break up lots of search results.
       // $articles = DB::table('articles')->where('title', 'LIKE', '%' . $query . '%')->paginate(10);
        $products=Product::Search($keyword);


        // returns a view and passes the view the list of articles and the original query.
        return view('search',['products'=>$products, 'keyword'=>$keyword]);
    }
}
