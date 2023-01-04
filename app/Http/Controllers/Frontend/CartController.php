<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    
    public function AddToCart(Request $request, $id)
    {
        
        $product = Product::findOrFail($id);

        if ($product->discount_price == NULL) 
        {
            Cart::add([
              
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);

            return response()->json(['success' => 'Añadido al Carrito Satisfactoriamente']);
        }
        else {
            Cart::add([
              
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);

            return response()->json(['success' => 'Añadido al Carrito Satisfactoriamente']);
        }


    }//end method

    public function AddMiniCart()
    {
    
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal,
        ));


    }//end method

    public function RemoveMiniCart($rowId)
    {
        
        Cart::remove($rowId);
        return response()->json(['success' => 'Producto Eliminado Éxitosamente']);

    }//end method

    public function AddToCartDetails(Request $request, $id)
    {
        
        $product = Product::findOrFail($id);

        if ($product->discount_price == NULL) 
        {
            Cart::add([
              
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);

            return response()->json(['success' => 'Añadido al Carrito Satisfactoriamente']);
        }
        else {
            Cart::add([
              
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);

            return response()->json(['success' => 'Añadido al Carrito Satisfactoriamente']);
        }


    }//end method

}