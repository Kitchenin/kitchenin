<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Category;
use App\Product;

class CategoryController extends Controller
{

    public function index()
    {
        return Category::getMainCategories();
    }

    /**
     * Get all items by given category.
     *
     * @param string $slug
     * @return Product[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getItems($slug)
    {
        $id = Category::where('slug', $slug)->firstOrFail()->id;
        $categories = $this->parseCategoryIds($id);
        $products   = Product::getItems($categories);

        return $products;
    }

    /**
     * Parse the category ids.
     *
     * @param int $id
     * @return array
     */
    private function parseCategoryIds(int $id)
    {
        $categories = Category::getCategoryIds($id);

        $data       = [];

        foreach($categories as $category) {
            $data[] = $category->id;
        }

        return $data;
    }
}
