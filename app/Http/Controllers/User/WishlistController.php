<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class WishlistController extends Controller
{
    
    public function AddToWishList(Request $request, $product_id)
    {
        
        if (Auth::check()) {
            $exists = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();

            if (!$exists) {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json(['success' => 'Agregado Satisfactoriamente a tu Lista de Deseos']);
            }else {
                return response()->json(['error' => 'Este Producto ya se encuentra en tu Lista de Deseos']);
            }

        }else {
            return response()->json(['error' => 'Ingrese a su cuenta Primero']);
        }

    }//end method

    public function AllWishList()
    {
     
        return view('frontend.wishlist.view_wishlist');

    }//end method

    public function GetWishlistProduct()
    {
        
        $wishlist = Wishlist::with('product')->where('user_id', Auth::id())->latest()->get();

        $wishQty = Wishlist::count();

        return response()->json(['wishlist' => $wishlist, 'wishQty' => $wishQty]);

    }//end method

    public function WishlistRemove($id)
    {
        
        Wishlist::where('user_id', Auth::id())->where('id',$id)->delete();

        return response()->json(['success' => 'Producto Eliminado Satisfactoriamente']);
        
    }//end method

}
