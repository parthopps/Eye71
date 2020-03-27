<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
Use Image;
Use File;

class CategoryController extends Controller
{

     public function index()
    {
    	$categories=Category::orderBy('id','desc')->get();
        return view ('backend.pages.category.index')->with('categories',$categories);
    }



    public function category_create()
    {
    	$main_categories=Category::orderBy('id','desc')->where('parent_id',NULL)->get();
    	return view('backend.pages.category.create',compact('main_categories')); //comapct and with same 
    }

     public function edit($id){
        $main_categories=Category::orderBy('id','desc')->where('parent_id',NULL)->get();
        $category = Category::find($id);
        if(!is_null( $category )){
            return view('backend.pages.category.edit',compact('category','main_categories'));

        }
        else{
            return redirect()->route('backend.pages.Category.index');

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
             'name.required' => "Please Provide A category Name ",
             'image.image' => "Give .png ,.jpeg, file",
            



            ]);

           $category =Category::find($id);

            $category->name=$request->name;
            $category->description =$request->description;
            $category->parent_id =$request->parent_id;


            

              if( $request->image > 0 ){

                 // ......if update image first delete than insert ...... //

             if(File::exists('img/category/'.$category->image)){

                File::delete('img/category/'.$category->image);
             }

             // ...... insert image ...... //


                $image = $request->file('image');
                $img = time().'.'. $image->getClientOriginalExtension();
                $location = public_path('img/category/'.$img);
                Image::make($image)->save($location);
                $category->image =$img;

          }
         
            $category->save();

            return redirect()->route('backend.pages.Category.index');

      
           
         }


            public function delete($id)
          {

            $category =Category::find($id);

            if(!is_null($category))
            {
                //..... if it is parent category, then delete all its sub category than delete category image ..... //
                if( $category->parent_id == NULL ){
                    $sub_categories=Category::orderBy('id','desc')->where('parent_id',$category->id)->get();

                    foreach ($sub_categories as $sub_categories) {

                           if(File::exists('img/category/'.$sub_categories->image)){

                           File::delete('img/category/'.$sub_categories->image);
                       
                      
                    }

                       $sub_categories->delete();
                    }

                }

                //......delete category image ..... //

                if(File::exists('img/category/'.$category->image)){

                File::delete('img/category/'.$category->image);
             }


                $category->delete();

            }
            return back();

           }


        public function category_store(Request $request)
    {

          $request->validate
       ([

        'name' => 'required|max:255',
        'image' => 'nullable|image',

    ],

    [
         'name.required' => "Please Provide A category Name ",
         'image.image' => "Give .png ,.jpeg, file",
        



        ]);

       $category = new category();

        $category->name=$request->name;
        $category->description =$request->description;
        $category->parent_id =$request->parent_id;


        // ...... insert image ...... //

          if( $request->image > 0 ){
         
            $image = $request->file('image');
            $img = time().'.'. $image->getClientOriginalExtension();
            $location = public_path('img/category/'.$img);
            Image::make($image)->save($location);
            $category->image =$img;

      }
     
        $category->save();

        return redirect()->route('backend.pages.Category.index');

  
       
     }
}
