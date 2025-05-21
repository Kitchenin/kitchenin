<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $menu;

    protected $data = [];

    public function __construct()
    {
        $this->menu = Category::getMainCategories();

        $this->data('menu', $this->menu);
    }

    protected function data($key, $value)
    {
        $this->data[$key] = $value;
    }
}
