<?php

namespace Faq\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Faq\Category;
use Faq\Question;

class SiteController extends Controller {

    //
    
    
    
    public function index() {
//        $cat = Category::find(1);
//    
//        $question = new Question([
//                                    'question' => 'Testquest'        
//                                    ]);
//        $cat->questions()->save($question);
//        
//        $q = Question::all();
//        dump($q);
//        return;
        
        $categories = Category::has('questions')->get();        
        return view('faq.index')->withCategories($categories);

    }

}
