<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
Use Image;
Use File;

class BrandController extends Controller
{
    public function index()
    {
    	$brand=Brand::orderBy('id','desc')->get();
        return view ('frontend.Brand.index')->with('brand',$brand);
    }

    public function brand_create()
    {
    	//$brand=brand::orderBy('id','desc')->where('parent_id',NULL)->get();
    	return view('frontend.Brand.create'); //comapct and with same 
    }


     public function brand_store(Request $request)
    {

          $request->validate
       ([

        'name' => 'required|max:255',
        'image' => 'nullable|image',

    ],

    [
         'name.required' => "Please provide a brand name ",
         'image.image' => "Give .png ,.jpeg, file",
        



        ]);

       $brand = new brand();

        $brand->name=$request->name;
        $brand->description =$request->description;
       // $brand->parent_id =$request->parent_id;


        // ...... insert image ...... //

        //  if( count($request->image) > 0 ){
         
            $image = $request->file('image');
            $img = time().'.'. $image->getClientOriginalExtension();
            $location = public_path('img/Brand/'.$img);
            Image::make($image)->save($location);
            $brand->image =$img;

    //  }
     
        $brand->save();

        return redirect()->route('admin.brand');

  
       
     }

     public function edit($id){
        
        $brand = Brand::find($id);
        if(!is_null( $brand )){
            return view('frontend.brand.edit',compact('brand'));

        }
        else{
            return redirect()->route('admin.brand');

        }
    }


         public function update( Request $request,$id)
        {

              $request->validate
           ([

            'name' => 'required|max:255',
            'image' => 'nullable|image',

        ],
        [
             'name.required' => "Please provide a brand Name ",
             'image.image' => "Give .png ,.jpeg, file",
            



            ]);

           $brand =Brand::find($id);

            $brand->name=$request->name;
            $brand->description =$request->description;
            


            

              if( $request->image > 0 ){

                 // ......if update image first delete than insert ...... //

             if(File::exists('img/Brand/'.$brand->image)){

                File::delete('img/Brand/'.$brand->image);
             }

             // ...... insert image ...... //


                $image = $request->file('image');
                $img = time().'.'. $image->getClientOriginalExtension();
                $location = public_path('img/Brand/'.$img);
                Image::make($image)->save($location);
                $brand->image =$img;

          }
         
            $brand->save();

            return redirect()->route('admin.brand');

      
           
         }


     public function delete($id)
          {

            $brand =Brand::find($id);

            if(!is_null($brand))
            {
                //..... if it is parent brand, then delete all its sub brand than delete brand image ..... //
             

                //......delete brand image ..... //

                if(File::exists('img/Brand/'.$brand->image)){

                File::delete('img/Brand/'.$brand->image);
             }


                $brand->delete();

            }
            return back();

           }
}
