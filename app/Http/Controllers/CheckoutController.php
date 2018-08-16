<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Cart;
use Mail;
class CheckoutController extends Controller
{
    public function index()
    {
      if(Cart::content()->count() == 0){
        Session::flash('info', 'Your cart is still emtyp');
        return redirect()->route('index');
      }
      return view('checkout');
    }

    public function pay()
    {
      Mail::to(request()->email)->send(new \App\Mail\PurchaseSuccessful);
      Cart::destroy();
      Session::flash('success', 'You have finish pay with cart thank you!!');
      return redirect()->route('index');
    }
}
