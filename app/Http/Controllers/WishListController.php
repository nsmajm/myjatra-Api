<?php

namespace App\Http\Controllers;

use App\Model\WishListModel;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    public function storeWishList(Request $request){
        $wishList = new WishListModel();
        $wishList->user_id = auth()->user()->id;
        $wishList->wish_type = $request->wish_type;
        $wishList->wish_type_id = $request->wish_type_id;
        $wishList->expected_from = $request->expected_from;
        $wishList->expected_to = $request->expected_to;
        $wishList->save();

        return response()->json($wishList->wishlist_id);
    }

    public function getWishList(Request $request){
        if(auth()->user()->id){
            $wishList = WishListModel::where('user_id',auth()->user()->id)->get();
            if(count($wishList) == null){
                return response()->json('You did not add any wiselist Yet');
            }
            else{
                return response()->json($wishList);
            }
        }
        else{
            return response()->json('Sorry');
        }

    }
}
