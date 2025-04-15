<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Page;

class PageController extends Controller
{

    public function getAllPages()
    {
        return Page::all();
    }

    public function getPageBySlug($slug)
    {
        return Page::where('slug', $slug)->firstOrFail();
    }
}
