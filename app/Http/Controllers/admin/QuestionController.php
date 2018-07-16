<?php

namespace Faq\Http\Controllers\admin;

use Illuminate\Http\Request;
use Faq\Http\Controllers\Controller;
use Faq\Category;
use Faq\Question;

use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        //
        $input = $request->except('_token');
        $questions = Category::has('questions')->where('id', $input['category'])->get();
        $data = [
            'title' => 'Вопросы',
            'categories' => $questions
        ];

        return view('admin/questions', $data);
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

        $data = [
            'title' => 'Редактирование вопроса',
            'data' => $old,
            'categories' => $categories
        ];

        return view('admin.questions_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Question $question, \Faq\Http\Requests\AnswerRequest $request) {
        //
        $input = $request->except('_token');
        $question->fill($input);
        if ($question->update()) {
            return redirect()->route('categories.index')->with('status', 'Вопрос успешно обновлен');
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
        return redirect()->route('questionsShowAll')->with('status', 'Вопрос удален');
    }

    

}
