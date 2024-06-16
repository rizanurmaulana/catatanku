<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        //include helper form
        helper(['form']);
        echo view('login');
    }
}
