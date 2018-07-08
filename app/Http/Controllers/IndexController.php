<?php

namespace Faq\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Faq\Category;
use Faq\Question;

class IndexController extends Controller {

    //

    public function index() {


        if (view()->exists('faq.home')) {
            $categories = Category::has('questions')->get();
            $data = [
                'title' => 'Главная',
                'categories' => $categories
            ];

            return view('faq/home', $data);
        }

        abort(404);
    }

    public function create(Category $category, Request $request) {

        if (view()->exists('faq.home_cat_add')) {
            $categories = Category::all();
            $data = [
                'title' => 'Новый вопрос',
                'categories' => $categories
            ];
            return view('faq.home_cat_add', $data);
        }
        abort(404);
    }

    public function store(Request $request) {

        $input = $request->except('_token');
        $messages = [
            'required' => 'Поле :attribute обязательно к заполнению',
            'unique' => 'Поле :attribute должно быть уникальным'
        ];
        $validator = Validator::make($input, [
                    'username' => 'required|max:255',
                    'email' => 'required|email|max:255',
                        ], $messages);

        if ($validator->fails()) {
            return redirect()->route('homeCatAdd')->withErrors($validator)->withInput();
        }

        $question = new Question();
        $question->fill($input);
        if ($question->save()) {
            return redirect('/')->with('status', 'Вопрос добавлен');
        }
    }

}
