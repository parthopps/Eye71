<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Category;

class ContactController extends Controller
{
       public function index()
    {
    	$contact=Contact::orderBy('id','desc')->get();
        return view ('backend.pages.contact.index')->with('contact',$contact);
    }

    public function delete($id)
          {

            $contact =Contact::find($id);

            if(!is_null($contact))
            {
                $contact->delete();

            }
            return back();

           }

      public function edit($id){
        
        $contact = Contact::find($id);
        if(!is_null( $contact )){
            return view('backend.pages.contact.edit',compact('contact'));

        }
        else{
            return redirect()->route('admin.contact');

        }
    }


         public function update( Request $request,$id)
        {

              

           $contact =Contact::find($id);

            $contact->email=$request->email;
            $contact->phone_number=$request->phone_number;
            $contact->address=$request->address;
            $contact->facebook=$request->facebook;
            $contact->instagram=$request->instagram;
            $contact->twitter=$request->twitter;
            

            

         
            $contact->save();

            return redirect()->route('admin.contact');

      
           
         }

       

}
