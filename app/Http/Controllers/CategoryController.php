<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class CategoryController extends Controller
{
    /**
     * @param string $slug
     * @return Factory|View|Application|object
     */
    public function getItems(string $slug)
    {
        $id = Category::where('slug', $slug)->firstOrFail()->id;
        $categories = $this->parseCategoryIds($id);
        $products   = Product::getItems($categories);
        $this->data('products', $products);
        return view('frontend.categories.products', $this->data);
    }

    /**
     * @param $slug
     * @return Factory|View|Application|object
     */
    public function getChildren($slug)
    {
        $category = Category::with('children')->where('slug', $slug)->firstOrFail();

        $this->data('category', $category);

        return view('frontend.categories.child', $this->data);
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