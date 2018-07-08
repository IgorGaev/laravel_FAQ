<?php

namespace Faq\Http\Controllers\admin;

use Illuminate\Http\Request;
use Faq\Category;
use Faq\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Faq\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    //
    public function index() {
         
        if (view()->exists('admin/categories')) {
            $categories = Category::all();
            $data = [
                'title' => 'Темы',
                'categories' => $categories,
            ];

            return view('admin.categories', $data);
        }

        abort(404);
    }

    public function create(Category $category, Request $request) {
        
        if (view()->exists('admin.categories_add')) {
            $data = [
                'title' => 'Новая Тема'
            ];
            return view('admin.categories_add', $data);
        }
        abort(404);
    }
    
    public function store(Request $request) {
        
        $input = $request->except('_token');
        $messages = [
            'required'=>'Поле :attribute обязательно к заполнению',
            'unique'=>'Поле :attribute должно быть уникальным'
        ];
        
        $validator = Validator::make($input, [
            'name'=>'required|max:255|unique:categories,name'], $messages);
        
        if($validator->fails()) {
            return   redirect()->route('categoriesAdd')->withErrors($validator)->withInput();
        }
        
        $category = new Category();
        $category->fill($input);
        if ($category->save()) {
            return redirect('admin/categories')->with('status','Тема создана');
        }
    }

    public function destroy(Category $category) {
//        dd($category);

        $category->questions()->delete();
        $category->delete();
        
        return redirect('admin/categories')->with('status', 'Тема удалена');
    }
    
}
