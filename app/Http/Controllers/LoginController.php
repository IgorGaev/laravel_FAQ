<?php

namespace Faq\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    
    public function show() { 
        
        return view('faq.admin_login');
        
    }
}
