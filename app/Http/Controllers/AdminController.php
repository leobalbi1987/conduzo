<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AdminController extends Controller
{
    public function home(): View
    {
        return view('admin.home');
    }
}
