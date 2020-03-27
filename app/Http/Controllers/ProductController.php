<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
    	
    	return view ('frontend.products.index');
   	
    }
     
     public function products()
    {

    	$products=Product::orderBy('id','desc')->paginate(10);

    	return view ('frontend.products.index')->with('products',$products);
    }
      public function show($slug)
    {
        $product = Product::where('slug',$slug)->first();
        $related_product = Product::where('slug','!=',$slug)->where('category_id',$product->category_id)->get();
        if (!is_null($product)) {

            //return view('frontend.products.show')->with('product',$product);
            return view('frontend.products.show',compact('product','related_product')); 
        }
        else{
            return redirect()->route('index');
        }
    }

    

           
    }

