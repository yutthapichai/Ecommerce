<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
      return view('vendor.index', ['products' => Product::paginate(10)]);
    }

    public function single($id)
    {
      return view('single', ['product' => Product::find($id)]);
    }
}
