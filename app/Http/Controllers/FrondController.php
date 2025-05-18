<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrondController extends Controller
{
    //

    public function index()
    {
        return view('page.index');
    }
    public function details()
    {
        return view('page.details');
    }
    public function order()
    {
        return view('page.order');
    }
}
