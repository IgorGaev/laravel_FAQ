<?php

namespace Faq\Http\Controllers\admin;

use Illuminate\Http\Request;
use Faq\User;
use Faq\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Faq\Http\Controllers\Controller;

class AdminsController extends Controller {

    //
    public function index() {
         
        if (view()->exists('admin/admins')) {
            $admins = User::all();
            $data = [
                'title' => 'Администраторы',
                'admins' => $admins
            ];

            return view('admin/admins', $data);
        }

        abort(404);
    }

    public function create(User $admin, Request $request) {
        
        if (view()->exists('admin.admins_add')) {
            $data = [
                'title' => 'Новый администратор'
            ];
            return view('admin.admins_add', $data);
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
            'login' => 'required|string|max:255|unique:users,login',
            'password' => 'required|string|min:5'
        ], $messages);
        
        if($validator->fails()) {
            return   redirect()->route('adminsAdd')->withErrors($validator)->withInput();
        }
        
        $input['password'] = Hash::make($input['password']);
        
        $admin = new User();
        $admin->fill($input);
        if ($admin->save()) {
            return redirect('admin')->with('status','Администратор добавлен');
        }
    }

    public function destroy(User $admin) {

        $admin->delete();
        return redirect('admin')->with('status', 'Администратор удалён');
    }
    
    public function edit(User $admin) {
        $old = $admin->toArray();
        if (view()->exists('admin.admins_edit')) {
            $data = [
                'title' => 'Редактирование пароля ',
                'data' => $old
            ];
            
            return view('admin.admins_edit',$data);
        }
    }
    
    public function update(User $admin, Request $request) {
        
        $input = $request->except('_token');
        $validator = Validator::make($input, [
            'password' => 'required|string|min:5',
        ]);
        
        
        if($validator->fails()) {
            return redirect()->route('adminsEdit',['admin' => $input['id']])->withErrors($validator);
        }
        
        $admin->password = Hash::make($input['password']);
        $admin->save();
        
        if($admin->save()) {
            return redirect('admin')->with('status', 'Пароль изменен');
        }
    }


}
