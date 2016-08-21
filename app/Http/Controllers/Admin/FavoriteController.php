<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests;

use App\Favorite;
use App\Product;
use Illuminate\Support\Facades\Auth;
class FavoriteController extends Controller
{



    public function addfavorite(Request $request)
    {
        $favorite= new Favorite;
        $checked=0;
        if($request->checkboxStatus == 'true')
        {
            $favorite->from_user_id=Auth::User()->id;
            $favorite->product_id=$request->get('id');
            $favorite->save();
            $message='Favoriet toegevoegd';
            $checked=1;
        }
        else
        {
            $deletefavorite= Favorite::findByUserId($request->get('id'));
            $deletefavorite->delete();
            $message='Favoriet verwijdert';
            $checked=0;
        }

     return response()->json(['message' => $message, 'checked'=>$checked],200);

    }
}
