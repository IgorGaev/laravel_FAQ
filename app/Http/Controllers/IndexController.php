<?php

namespace Faq\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Faq\Category;
use Faq\Question;

class IndexController extends Controller {

    //

    public function index() {
        
            $categories = Category::has('questions')->get();
            $data = [
                'title' => 'Главная',
                'categories' => $categories
            ];

            return view('faq/home', $data);
    }

    public function create(Category $category, Request $request) {

            $categories = Category::all();
            $data = [
                'title' => 'Новый вопрос',
                'categories' => $categories
            ];
            return view('faq.home_cat_add', $data);
        }

    public function store(\Faq\Http\Requests\QuestionRequest $request) {

        $input = $request->except('_token');
        $question = new Question();
        $question->fill($input);
        if ($question->save()) {
            return redirect('/')->with('status', 'Вопрос добавлен');
        }
    }

}
