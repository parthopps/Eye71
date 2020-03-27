<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Product;
use App\Category;
use App\Brand;
use App\Blog;

class PageController extends Controller
{
    public function index()
    {
    	
    	return view ('frontend.homepage.homepage');
   	
    }
     public function products()
    {

    	$products=Product::orderBy('id','desc')->paginate(10); 
        
        //mens and women need then query is $products=Product::orderBy('id','desc')->where('parent_id',NULL)->paginate(10); 

    	return view ('frontend.homepage.homepage')->with('products',$products);
    }

    public function search(Request $request){

        $search=$request->search;
        $products=Product::orWhere('title','like','%'.$search.'%')
          ->orWhere('description','like','%'.$search.'%')
          ->orWhere('price','like','%'.$search.'%')
           ->orWhere('quantity','like','%'.$search.'%')
            ->orWhere('id','desc')->paginate(10);
        
        

        //return view ('pages.product.search',compact('search','product'));
        return view('frontend.products.search',compact('search','products')); 

    }

    public function show($id)
    {


        $category=Category::find($id);

        if(!is_null($category)){

        return view ('frontend.category.index',compact('category'));
    }
    else{
        session()->flash('error','Sorry !!');
        return redirect('/admin');
    }

}
public function brandshow($id)
    {


        $brand=Brand::find($id);

        if(!is_null($brand)){

        return view ('frontend.brand.showbrand',compact('brand'));
    }
    else{
        session()->flash('error','Sorry !!');
        return redirect('/admin');
    }

}



}
