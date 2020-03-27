<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Product;
Use Image;
use App\ProductImage;

class AdminPagesController extends Controller
{
    public function index()
    {
    	
    	return view ('backend.pages.index');
   	
    }

     public function product_create()
    {
    	
    	return view ('backend.pages.product.create');
   	
    }

    public function product_edit( $id )
    {
        $products=Product::find( $id );
        return view('backend.pages.product.edit')->with('products',$products);
    }

    public function manage_products()
    {
        $products=Product::orderBy('id','desc')->get();
        return view ('backend.pages.product.index')->with('products',$products);
        
    }

     public function product_update(Request $request,$id)
    {

       $request->validate
       ([

        'title' => 'required|max:255',
        'description' => 'required',
        'price' => 'required|numeric',
        'offer_price' => 'required|numeric',
        'quantity' => 'required|numeric',

        



        ]);

        $product =Product::find($id);

        $product->title =$request->title;
        $product->description =$request->description;
        $product->price =$request->price;
        $product->offer_price =$request->offer_price;
        $product->quantity =$request->quantity;

        $product->slug=$request->title;
        
        $product->admin_id=1;

    
        $product->save();

        return redirect()->route('backend.pages.product.index');

    }

     public function product_delete($id)
   { 

    $product =Product::find($id);
    $image=ProductImage:: where('product_id', $id);

    


    if(!is_null($product))
    {
        $product->delete();
        $image->delete();
        


    }
    return back();

   }


    public function product_store(Request $request)
    {

       $request->validate
       ([

        'title' => 'required|max:255',
        'description' => 'required',
        'price' => 'required|numeric',
        'quantity' => 'required|numeric',
        'category_id' => 'required|numeric',
        'brand_id' => 'required|numeric',


        ]);

        $product = new product;

        $product->title =$request->title;
        $product->description =$request->description;
        $product->price =$request->price;
        $product->offer_price =$request->offer_price;
        $product->quantity =$request->quantity;

        $product->slug=$request->title;
        $product->category_id=$request->category_id;
        $product->brand_id=$request->brand_id;
        $product->admin_id=1;
        $product->save();

       // product Image model insert

        // if($request->hasFile('product_image'))
        // {
        //   // insert image code here

        //  $image = $request->file('product_image');
        //  $img = time().'.'. $image->getClientOriginalExtension();
        //  $location = public_path('img/'.$img);
        //  Image::make($image)->save($location);

        //  $product_image = new ProductImage;
        //  $product_image->product_id = $product->id;
        //  $product_image->image = $img;
        //  $product_image->save();

        // }

           if( $request->product_image > 0 ){

            foreach ($request->product_image as $image) {
           
             // insert multiple image code here

           // $image = $request->file('product_image');
                $random = Str::random(10);

            $img = $random.'.'. $image->getClientOriginalExtension();
            $location = public_path('img/test/'.$img);
            Image::make($image)->save($location);

            $product_image = new ProductImage;
            $product_image->product_id = $product->id;
            $product_image->image = $img;
            $product_image->save();

        
            }
           }


        return redirect()->route('backend.pages.product.create');

    }


   
    
}

