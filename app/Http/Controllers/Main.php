<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

use App;

class Main extends Controller
{
    public function __construct(){
        
        $lang = Route::current()->parameters();
        
        if($lang){
            
            $new_lang = $lang['local'];
            
        }else{
            $new_lang = 'en';
        }
                
                
        $x = App::setLocale($new_lang);
                
    }
    
}