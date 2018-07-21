<?php

namespace Faq\Http\Controllers\admin;

use Illuminate\Http\Request;
use Faq\Http\Controllers\Controller;

class AdminpanelController extends Controller
{
    public function index () {
            return view('admin.index');
        }
}
