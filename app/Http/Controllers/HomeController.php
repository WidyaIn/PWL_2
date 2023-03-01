<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SebastianBergmann\Template\Template;

class HomeController extends Controller
{
    public function index(){
        return view("praktikum1.home");
    }
}
