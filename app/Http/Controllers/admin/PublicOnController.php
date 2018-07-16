<?php

namespace Faq\Http\Controllers\admin;

use Illuminate\Http\Request;
use Faq\Http\Controllers\Controller;
use Faq\Question;

class PublicOnController extends Controller
{
    //
    public function publicOn(Question $question) {
        $question->public = 1;
        $question->save();
        if ($question->save()) {
            return redirect('admin/categories')->with('status', 'Вопрос опубликован');
        }
    }

    public function publicOff(Question $question) {
        $question->public = 0;
        $question->save();
        if ($question->save()) {
            return redirect('admin/categories')->with('status', 'Вопрос скрыт');
        }
    }
}
