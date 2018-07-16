<?php

namespace Faq\Http\Controllers\admin;

use Illuminate\Http\Request;
use Faq\Http\Controllers\Controller;
use Faq\Question;

class AllQuestionsController extends Controller
{
    //
    public function show() {
        //
        $questions = Question::whereNull('answer')->get();
        $data = [
            'title' => 'Вопросы без ответа',
            'questions' => $questions
        ];

        return view('admin/questions_all', $data);
    }
}
