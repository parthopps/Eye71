<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
Use Image;
Use File;

class AdminController extends Controller
{
    public function index()
    {
    	$blog=Blog::orderBy('id','desc')->get();
        return view ('Backend.pages.blog.index')->with('blog',$blog);
    }

    public function blog_create()
    {
    	//$brand=brand::orderBy('id','desc')->where('parent_id',NULL)->get();
    	return view('backend.pages.blog.create'); //comapct and with same 
    }


     public function blog_store(Request $request)
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

       $blog = new blog();

        $blog->name=$request->name;
        $blog->description =$request->description;
       // $blog->parent_id =$request->parent_id;


        // ...... insert image ...... //

        //  if( count($request->image) > 0 ){
         
            $image = $request->file('image');
            $img = time().'.'. $image->getClientOriginalExtension();
            $location = public_path('img/blog/'.$img);
            Image::make($image)->save($location);
            $blog->image =$img;

    //  }
     
        $blog->save();

        return redirect()->route('admin.blog');

  
       
     }

      public function edit($id){
        
        $blog = Blog::find($id);
        if(!is_null( $blog )){
            return view('backend.pages.blog.edit',compact('blog'));

        }
        else{
            return redirect()->route('admin.blog');

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
             'name.required' => "Please provide a blog Name ",
             'image.image' => "Give .png ,.jpeg, file",
            



            ]);

           $blog =Blog::find($id);

            $blog->name=$request->name;
            $blog->description =$request->description;
            


            

              if( $request->image > 0 ){

                 // ......if update image first delete than insert ...... //

             if(File::exists('img/Blog/'.$blog->image)){

                File::delete('img/Blog/'.$blog->image);
             }

             // ...... insert image ...... //


                $image = $request->file('image');
                $img = time().'.'. $image->getClientOriginalExtension();
                $location = public_path('img/Blog/'.$img);
                Image::make($image)->save($location);
                $blog->image =$img;

          }
         
            $blog->save();

            return redirect()->route('admin.blog');

      
           
         }

      public function delete($id)
          {

            $blog =Blog::find($id);

            if(!is_null($blog))
            {
                //..... if it is parent brand, then delete all its sub brand than delete brand image ..... //
             

                //......delete brand image ..... //

                if(File::exists('img/Blog/'.$blog->image)){

                File::delete('img/Brand/'.$blog->image);
             }


                $blog->delete();

            }
            return back();

           }

           public function blogshow()
    {
    	$blog=Blog::orderBy('id','desc')->get();
        return view ('frontend.homepage.homepage')->with('blog',$blog);
    }

}
