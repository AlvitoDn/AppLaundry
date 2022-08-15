<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('admin');
    }
    public function laundry()
    {
        return view('laundry');
    }
}
