<?php

namespace Faq\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //
    
    public function show() { 
        
        $data = array('title'=>'FAQ');
        return view('faq.question', $data );
        
    }
}
