<?php

namespace Faq\Http\Controllers\admin;

use Illuminate\Http\Request;
use Faq\Http\Controllers\Controller;

class AdminpanelController extends Controller
{
    //
    public function index () {
            $data = ['title' => 'Панель администратора'];
            return view('admin.index', $data);
        }
}
