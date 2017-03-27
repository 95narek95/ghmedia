<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\youtube_link;

use App\service_image;

use App\Client;

use App\Work;

use App\Slider;

use App\About;

use Mail;

class HomeController extends Main    
{
    public function __construct()
    {
        parent::__construct();
    
    }
    
    public function index_redirect(){
        return redirect('/en');
    }
    public function index(){
        
        $clients = Client::all();
        
        $works = Work::all();
        
        $sliders = Slider::all();
        
        $abouts = About::all()->first();
        
        return view('ghmedia.index',['clients'=>$clients,'works'=>$works,"sliders"=>$sliders,"abouts"=>$abouts]);
        
    }
    
    public function get_about_text(){
        
        $abouts = About::all()->first();
        
        return response()->json([
           'data' => $abouts,
        ]);
        
    }
    
    public function clients(){

        $clients = Client::paginate(16);
        
        return view('ghmedia.clients')->with(['clients'=>$clients]);
        
    }
    
    public function about(){
        
        return view('ghmedia.about');
        
    }
    
    public function contacts(){
        
        
        return view('ghmedia.contacts');
        
    }
    public function services(){
        
        $links = youtube_link::all();
                
        return view('ghmedia.services')->with(["links"=>$links]);
        
    }
    
    public function getImages(Request $request){
        
        $category = $request->category;
        
        $images = service_image::join('image_categories', 'image_categories.id', '=', 'service_images.category_id')->select('service_images.id', 'image','name')->where("category_id",$category)->get();
        return response()->json([
           'data' => $images,
        ]);
        
    }
    
    public function send_sms(Request $request){
        
        $validate = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'sms' => 'required|min:10',
        ]);
        
        $name = $request->name;
        $email = $request->email;
        $sms = $request->sms;
        
        Mail::send([], [], function ($message) use ($name,$email,$sms) {
          $message->to("95narek95@gmail.com")
            ->subject("hi")
            // here comes what you want
            ->setBody(" Sms : $sms \n Mail : $email \n Name : $name "); // assuming text/plain
            // or:
        });
        
            
        $request->session()->flash('send_sms', 'Message sent !');

        return redirect()->back();
        
    }
}
