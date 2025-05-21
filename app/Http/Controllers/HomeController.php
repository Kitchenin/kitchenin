<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Vite;

class HomeController extends Controller
{
    public function index()
    {

        return view('home', $this->data);
    }
}
