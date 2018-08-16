<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;
class ShoppingController extends Controller
{
    public function add_to_cart()
    {
      $pdt = Product::find(request()->pdt_id);

      $cartItem = Cart::add([
        'id' => $pdt->id,
        'name' => $pdt->name,
        'qty' => request()->amount,
        'price' => $pdt->price
      ]);

      Cart::associate($cartItem->rowId, 'App\Product');

     //dd($cart);
     //dd(Cart::content);
     return redirect()->route('cart');
    }

    public function cart()
    {
      //Cart::destroy();
      return view('cart');
    }

    public function cart_delete($id)
    {
      Cart::remove($id);
      return redirect()->back();
    }

    public function reduce($id, $qty)
    {
      Cart::update($id, $qty - 1);
      return redirect()->back();
    }

    public function recrement($id, $qty)
    {
      Cart::update($id, $qty + 1);
      return redirect()->back();
    }
}
