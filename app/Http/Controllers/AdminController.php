<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\youtube_link;

use App\service_image;

use App\image_categorie;

use App\Work;

use App\Client;

use App\Slider;

use App\About;

class AdminController extends Controller
{
    public function index(){
        return view("admin.login");
    }
    public function login(){
                
        return view("admin.index");
        
    }
    public function getadmin_login() {
        if (session()->has('admin')) {
            return $this->login();
        }else{
            return $this->index();
        }       
    }
    public function admin_login(Request $request){
        $login = $request->login;
        $password= $request->password;
        if($login == "admin" && $password=="admin"){
            $request->session()->put('admin', 'login');
            return $this->getadmin_login();
        }else{
            $request->session()->flash('error_login','Wrong login or password! Try again');
            return redirect()->back();
        }
    }
    public function logout(Request $request){
        
         $request->session()->forget('admin');
         return $this->index();
    }
    
    public function add_you_link(Request $request){
        
        $validate = $this->validate($request, [
            'link' => 'required',
            'image' => 'required',
        ]);
        
        $link = $request->link;
        
        $file = $request->image;
                
        $file_original_name = uniqid().$file->getClientOriginalName();
        
        $file->move("images_you_link",$file_original_name);
        
        $x = new youtube_link();
        
        $x->link = $link;
        $x->image = $file_original_name;
        $res = $x->save();
        
        if($res){
            $request->session()->flash("link_success","Youtube Link Added");
            return redirect()->back(); 
        }else{
            $request->session()->flash("link_error","Something Went Wrong ! Try Again !!!");
            return redirect()->back();
        }
        
    }
    public function getadd_you_link(){
        if(session()->has('admin')){
            
            return view('admin.index');
            
        }else{
            return view('admin.login');
        }
    }
    public function add_latest_work(Request $request){
        $validate = $this->validate($request, [
            'image' => 'required',
        ]);
                
        $file = $request->image;
                
        $file_original_name = uniqid().$file->getClientOriginalName();
        
        $file->move("images_latest_works",$file_original_name);
        
        $x = new Work();
        
        $x->image = $file_original_name;
        
        $res = $x->save();
        
        if($res){
            $request->session()->flash("work_success","Latest Work Added");
            return redirect()->back(); 
        }else{
            $request->session()->flash("work_error","Something Went Wrong ! Try Again !!!");
            return redirect()->back();
        }

    }
    public function getadd_latest_work(){
        if(session()->has('admin')){
            
            return view("admin.latest");
            
        }else{
            return view('admin.login');
        }
    }
    public function add_clietns(Request $request){
        
        $validate = $this->validate($request, [
            'image' => 'required',
        ]);
                
        $file = $request->image;
                
        $file_original_name = uniqid().$file->getClientOriginalName();
        
        $file->move("images_clients",$file_original_name);
        
        $x = new Client();
        
        $x->image = $file_original_name;
        
        $res = $x->save();
        
        if($res){
            $request->session()->flash("client_success","Client Added");
            return redirect()->back(); 
        }else{
            $request->session()->flash("client_error","Something Went Wrong ! Try Again !!!");
            return redirect()->back();
        }

    }
    public function getadd_clietns(){
        if(session()->has('admin')){
            
            return view("admin.clients");
            
        }else{
            return view('admin.login');
        }
    }
    public function add_img_category(Request $request){
                
        $validate = $this->validate($request, [
            'image' => 'required',
        ]);
        
        $category = $request->category;
        
        $file = $request->image;
                
        $file_original_name = uniqid().$file->getClientOriginalName();
        
        $file->move("images_by_category",$file_original_name);
        
        $x = new service_image();
        
        $x->name = $file_original_name;
        
        $x->category_id = $category;
        
        $res = $x->save();
        
        if($res){
            $request->session()->flash("img_cat_success","Image By Category Added");
            return redirect()->back(); 
        }else{
            $request->session()->flash("img_cat_error","Something Went Wrong ! Try Again !!!");
            return redirect()->back();
        }
    }
    public function getadd_img_category(){
        if(session()->has('admin')){
        
            $categories = image_categorie::all();

            return view("admin.category")->with(["categories"=>$categories]);
            
        }else{
            return view('admin.login');
        }
    }
    
    public function delete_clients(){
        if(session()->has('admin')){
            
            $clients = Client::paginate(6);
            
            return view("admin.delete_client")->with(['clients'=>$clients]);
            
        }else{
            return view('admin.login');
        }
    }
    
    public function delete_current_client($id){
        $client = Client::find($id);
        $res = $client->delete();
        if($res){
            return redirect()->back();
        }else{
            return redirect()->back();

        }
    }
    public function delete_works(){
        if(session()->has('admin')){
            
            $works = Work::paginate(6);
            
            return view("admin.delete_works")->with(['works'=>$works]);
            
        }else{
            return view('admin.login');
        }
    }
    public function delete_current_works($id){
        $work = Work::find($id);
        $res = $work->delete();
        if($res){
            return redirect()->back();
        }else{
            return redirect()->back();

        }
    }
    public function delete_youtube(){
        if(session()->has('admin')){
            
            $youtubes = youtube_link::paginate(6);
            
            return view("admin.delete_youtube")->with(['youtubes'=>$youtubes]);
            
        }else{
            return view('admin.login');
        }
    }
    public function delete_current_youtube($id){
        $youtube = youtube_link::find($id);
        $res = $youtube->delete();
        if($res){
            return redirect()->back();
        }else{
            return redirect()->back();

        }
    }
    public function delete_category(){
        if(session()->has('admin')){
            
            $categories = service_image::join('image_categories', 'image_categories.id', '=', 'service_images.category_id')->select('service_images.id', 'image','name')->paginate(6);
            return view("admin.delete_category")->with(['categories'=>$categories]);
            
        }else{
            return view('admin.login');
        }
    }
    public function delete_current_category($id){
        $category = service_image::find($id);
        $res = $category->delete();
        if($res){
            return redirect()->back();
        }else{
            return redirect()->back();

        }
    }
    
    public function update_aboutus(){
        
        if(session()->has('admin')){
            
            $abouts = About::first();
            return view("admin.update_about")->with(['abouts'=>$abouts]);
            
        }else{
            return view('admin.login');
        }
        
    }
    public function update_text(Request $request){
        if($request->hy){
            $x = $request->hy;
            $update = About::where('id',1)
                            ->update(["text_hy"=>$x]);
            session()->flash("update_hy","Text Updated");
            return redirect()->back();
            
        }
        if($request->ru){
            $x = $request->ru;
            $update = About::where('id',1)
                            ->update(["text_ru"=>$x]);
            session()->flash("update_ru","Text Updated");
            return redirect()->back();

        }
        if($request->en){
            $x = $request->en;
            $update = About::where('id',1)
                            ->update(["text_en"=>$x]);
            session()->flash("update_en","Text Updated");
            return redirect()->back();

        }
    }
//    update slider
    public function getupdate_slider(){
        
        if(session()->has('admin')){
            
            $sliders = Slider::all();
            return view("admin.update_slider")->with(['sliders'=>$sliders]);
            
        }else{
            return view('admin.login');
        }
        
    }
    public function update_slider(Request $request){
        if($request->slide_1){
            $validate = $this->validate($request, [
                'slide_1' => 'required',
            ]);
            
            $file = $request->slide_1;

            $file_original_name = uniqid().$file->getClientOriginalName();

            $file->move("images_slider",$file_original_name);
            
            $update = Slider::where('id',1)
                            ->update(["image"=>$file_original_name]);
            session()->flash("update_1","Image Updated");
            return redirect()->back();
            
        }
        if($request->slide_2){
            $validate = $this->validate($request, [
                'slide_2' => 'required',
            ]);

            $file = $request->slide_2;

            $file_original_name = uniqid().$file->getClientOriginalName();

            $file->move("images_slider",$file_original_name);
            
            $update = Slider::where('id',2)
                            ->update(["image"=>$file_original_name]);
            session()->flash("update_2","Image Updated");
            return redirect()->back();

        }
        if($request->slide_3){
            $validate = $this->validate($request, [
                'slide_3' => 'required',
            ]);

            $file = $request->slide_3;

            $file_original_name = uniqid().$file->getClientOriginalName();

            $file->move("images_slider",$file_original_name);
            
            $update = Slider::where('id',3)
                            ->update(["image"=>$file_original_name]);
            session()->flash("update_3","Image Updated");
            return redirect()->back();

        }
        for($i=1;$i<=3;$i++){
            $x = "hy_".$i;
            if($request->$x){

                $text = $request->$x;

                $update = Slider::where('id',$i)
                                ->update(["text_hy"=>$text]);
                session()->flash("update_hy_$i","Text Updated");
                return redirect()->back();

            }
            
        }
        for($i=1;$i<=3;$i++){
            $x = "ru_".$i;
            if($request->$x){

                $text = $request->$x;

                $update = Slider::where('id',$i)
                                ->update(["text_ru"=>$text]);
                session()->flash("update_ru_$i","Text Updated");
                return redirect()->back();

            }
            
        }
        for($i=1;$i<=3;$i++){
            $x = "en_".$i;
            if($request->$x){

                $text = $request->$x;

                $update = Slider::where('id',$i)
                                ->update(["text_en"=>$text]);
                session()->flash("update_en_$i","Text Updated");
                return redirect()->back();

            }
            
        }
        return redirect()->back();

    }
}
