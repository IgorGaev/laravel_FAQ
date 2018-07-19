<?php

namespace Faq\Http\Controllers\admin;

use Illuminate\Http\Request;
use Faq\Http\Controllers\Controller;
use Faq\User;
use Faq\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
        $admins = User::all();
        $data = [
            'title' => 'Администраторы',
            'admins' => $admins
        ];

        return view('admin/admins', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $admin, Request $request) {
        //
        $data = [
            'title' => 'Новый администратор'
        ];
        return view('admin.admins_add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request) {
        //
        $input = $request->except('_token');

        $input['password'] = Hash::make($input['password']);

        $admin = new User();
        $admin->fill($input);
        if ($admin->save()) {
            return redirect()->route('admins.index')->with('status', 'Администратор добавлен');
        }
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
    public function edit(User $admin) {
        //
        $old = $admin->toArray();
        $data = [
            'title' => 'Редактирование пароля ',
            'data' => $old
        ];

        return view('admin.admins_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $admin, Request $request) {
        //
        $input = $request->except('_token');
        $validator = Validator::make($input, [
                    'password' => 'required|string|min:5',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admins.edit', ['admin' => $input['id']])->withErrors($validator);
        }

        $admin->password = Hash::make($input['password']);
        $admin->save();

        if ($admin->save()) {
            return redirect()->route('admins.index')->with('status', 'Пароль изменен');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin) {
        //
        $admin->delete();
        return redirect()->route('admins.index')->with('status', 'Администратор удалён');
    }

}
