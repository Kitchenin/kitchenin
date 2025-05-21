<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Product;

class CategoryController extends Controller
{
    /**
     * Get all items by given category.
     *
     * @param string $slug
     * @return Product[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getItems(string $slug)
    {
        $id = Category::where('slug', $slug)->firstOrFail()->id;
        $categories = $this->parseCategoryIds($id);
        $products   = Product::getItems($categories);
        dd($categories, $products);
    }
}