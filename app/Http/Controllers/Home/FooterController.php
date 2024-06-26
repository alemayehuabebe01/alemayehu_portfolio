<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class FooterController extends Controller
{

    public function FooterSetup(){
        $allfooter = Footer::find(1);
        return view('admin.footer.footer_page_all',compact('allfooter'));
    }// end method 

    public function UpdateFooter(Request $request){
        $footer_id = $request->id;
        Footer::findOrFail($footer_id)->update([

            'number'=>$request->number,
            'short_description'=>$request->short_description,
            'adress'=>$request->adress,
            'email'=>$request->email,
            'facebook'=>$request->facebook,
            'linkedin'=>$request->linkedin,
            'copyright'=>$request->copyright,
            
              
          ]);

          $notification = array (
              'message' => 'Footer Data updated Successfuly',
              'alert-type'=> 'success'
          );
          return redirect()->route('footer.setup')->with($notification);
    }
    
}
