<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('dashboard.master.index', [
            'title' => 'Home',
        ]);
    }
}
