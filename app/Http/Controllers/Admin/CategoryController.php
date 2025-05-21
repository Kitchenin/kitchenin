<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\PhotoHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index()
    {
        return view('admin.category.index');
    }

    public function listAll()
    {
        $categories = Category::getAllOrdered();
        return view('admin.category.list', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        $categories = Category::where('parent_id', null);
        return view('admin/category/form', [
            'formTitle' => 'New category',
            'formUrl' => 'admin/categories',
            'categories' => $categories,
        ]);
    }

    public function store(StoreCategoryRequest $request)
    {
        $data = $request->all();

        if (!isset($data['slug']) || empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $category = Category::create($data);
        if (!empty($data['photoIds'])) {
            $featured = isset($data['featuredPhotoId']) ? $data['featuredPhotoId'] : null;
            PhotoHelper::attach($category, $data['photoIds'], $featured);
        }

        $category->slug = $category->id . '-' . substr($category->slug, 0, 60);
        $category->save();

        return response()->json(['message' => ['Category is successfully added!']]);
    }

    public function edit(Request $request, Category $category)
    {

        if (!$request->ajax()) {
            return view('admin.category.index', [
                'editId' => $category->id
            ]);
        }

        $categories = Category::all();

        return view('admin/category/form', [
            'formTitle' => 'Edit '.$category->name,
            'formUrl' => 'admin/categories/'.$category->id,
            'item' => $category,
            'categories' => $categories,
        ]);
    }

    public function update(StoreCategoryRequest $request, Category $category)
    {
        $data = $request->all();

        $category->update($data);
        if (!empty($data['photoIds'])) {
            $featured = isset($data['featuredPhotoId']) ? $data['featuredPhotoId'] : null;
            PhotoHelper::attach($category, $data['photoIds'], $featured);
        }

        return response()->json(['message' => ['Category is successfully updated!']]);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('admin/categories')->withMessage('Category was deleted!');
    }
}
