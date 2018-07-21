<?php

namespace Faq\Http\Controllers\admin;

use Illuminate\Http\Request;
use Faq\Http\Controllers\Controller;
use Faq\Category;
use Faq\Question;
use Faq\Http\Requests\AnswerRequest;

use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        //отображение тем с вопросами.
        $input = $request->except('_token');
        $categories = Category::has('questions')->where('id', $input['category'])->get();
        return view('admin.questions')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question) {
        //
        $old = $question->toArray();
        $categories = Category::all();

        return view('admin.questions_edit', ['data' => $old,
                                            'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Question $question, AnswerRequest $request) {
        //
        $input = $request->except('_token');
        $question->fill($input);
        if ($question->update()) {
            return redirect()->route('categories.index')->with('status', 'Вопрос успешно отредактирован');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question) {
        //
        $question->delete();
        return redirect()->route('categories.index')->with('status', 'Вопрос удален');
    }
    
    public function showAll() {
        //Отображает все вопросы без ответа
        $questions = Question::whereNull('answer')->get();

        return view('admin.questions_all')->with('questions',$questions);
    }
    
    public function publicOn(Question $question) {
        
        $question->public = 1;
        $question->save();
        if ($question->save()) {
            return redirect()->route('categories.index')->with('status', 'Вопрос опубликован');
        }
    }

    public function publicOff(Question $question) {
        
        $question->public = 0;
        $question->save();
        if ($question->save()) {
            return redirect()->route('categories.index')->with('status', 'Вопрос скрыт');
        }
    }

}
