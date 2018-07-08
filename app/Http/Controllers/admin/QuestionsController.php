<?php

namespace Faq\Http\Controllers\admin;

use Illuminate\Http\Request;
use Faq\Category;
use Faq\Question;
use Illuminate\Support\Facades\Validator;
use Faq\Http\Controllers\Controller;

class QuestionsController extends Controller
{
    public function index(Request $request) {
         
        if (view()->exists('admin/questions')) {
            $input = $request->except('_token');
            $questions = Category::has('questions')->where('id', $input['category'])->get();
            $data = [
                'title' => 'Вопросы',
                'categories' => $questions
            ];

            return view('admin/questions', $data);
        }

        abort(404);
    }
    
    public function showAll() {
         
        if (view()->exists('admin/questions_all')) {
            
            $questions = Question::whereNull('answer')->get();
            $data = [
                'title' => 'Вопросы без ответа',
                'questions' => $questions
            ];

            return view('admin/questions_all', $data);
        }

        abort(404);
    }
    
    public function create(Category $сategory, Request $request) {
        
        if (view()->exists('admin.questions_add')) {
            $categories = Category::all(); 
            $data = [
                'title' => 'Задать вопрос',
                'categories'=> $categories
            ];
            return view('admin.questions_add', $data);
        }
        abort(404);
    }
    
    public function edit(Question $question )
    {
        $old = $question->toArray();
        if (view()->exists('admin.questions_edit')) {
            $categories = Category::all();
           
            $data = [
                'title' => 'Редактирование вопроса',
                'data' => $old,
                 'categories' => $categories   
            ];
            
            return view('admin.questions_edit', $data);
        }
        abort(404);
    }
    public function update(Question $question, Request $request)
    {
        $input = $request->except('_token');
        $validator = Validator::make($input, [
            'question' => 'required',
            'username' => 'required|max:255',
            'answer' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->route('questionsEdit', ['page' => $input['id']])->withErrors($validator);
        }
        $question->fill($input);
        if ($question->update()) {
            return redirect('admin/categories')->with('status', 'Вопрос успешно обновлен');
        }
    }
    
    public function publicOn (Question $question)
    {
        $question->public = 1;
        $question->save();
        if ($question->save()) {
            return redirect('admin/categories')->with('status', 'Вопрос опубликован');
        }
    }
    public function publicOff (Question $question)
    {
        $question->public = 0;
        $question->save();
        if ($question->save()) {
            return redirect('admin/categories')->with('status', 'Вопрос скрыт');
        }
    }
    
    
    
    
    public function destroy(Question $question) {

        $question->delete();
        return redirect()->route('questionsShowAll')->with('status', 'Вопрос удален');
    }
    
    
}
