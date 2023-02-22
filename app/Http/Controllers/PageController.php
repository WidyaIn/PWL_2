<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return "Selamat Datang";
    }
    public function about(){
        return "2141720034 Widya Indah";
    }
    public function articel($id){
        return "Halaman Artikel dengan Id {$id}";
    }
}
