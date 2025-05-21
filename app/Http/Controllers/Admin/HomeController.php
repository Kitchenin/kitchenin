<?php

namespace App\Http\Controllers\Admin;

use App\Colour;
use App\Ending;
use App\Group;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Option;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private static array $MODELS = [
        'categories' => Category::class,
        'endings' => Ending::class,
        'colours' => Colour::class,
        'options' => Option::class,
        'products' => Product::class,
        'groups' => Group::class
    ];

    public function index()
    {
        return view('admin.home.index');
    }


    public function ordering(Request $request)
    {
        $data = $request->all();
        $model = self::$MODELS[$data['entity']];

        foreach ($data['orders'] as $order) {
            if (isset($order['id']) && isset($order['index'])) {
                $model::where('id', $order['id'])->update(['index' => $order['index']]);
            }
        }

    }

}
