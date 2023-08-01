<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;

class IndexController extends BaseController
{
    public function index(): View
    {
        return view('login');
    }
}
