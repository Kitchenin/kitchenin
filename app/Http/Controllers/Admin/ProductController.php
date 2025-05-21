<?php

namespace App\Http\Controllers\Admin;

use App\ColourGroup;
use App\EndingGroup;
use App\Group;
use App\Helpers\ExcelHelper;
use App\Helpers\PhotoHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ProductController extends Controller
{

    public function index(Category $category)
    {
        return view('admin.product.index', [
            'productCategory' => $category,
        ]);
    }

    public function listAll(Category $category)
    {
        $products = $category->products()->get();
        return view('admin.product.list', [
            'products' => $products
        ]);
    }

    public function listJson(Category $category)
    {
        $products = $category->products()->pluck('name', 'id')->all();
        return response()->json(['products' => $products]);
    }

    public function create(Category $category)
    {
        $categories = Category::getMainCategories()->where('parent_id', null)->all();
        $groups = Group::all();
        $colourGroups = ColourGroup::all();
        $endingGroups = EndingGroup::all();

        return view('admin.product.form', [
            'formTitle' => 'New product',
            'formUrl' => 'admin/categories/'.$category->id.'/products',
            'groups' => $groups,
            'colourGroups' => $colourGroups,
            'endingGroups' => $endingGroups,
            'categories' => $categories,
            'category' => $category
        ]);
    }

    public function store(StoreProductRequest $request, Category $category)
    {
        $data = $request->all();

        if (!isset($data['slug']) || empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $product = Product::create($data);
        $product->slug = $product->id . '-' . substr($product->slug, 0, 60);
        $product->save();
        if (isset($data['photoIds'])) {
            $featured = isset($data['featuredPhotoId']) ? $data['featuredPhotoId'] : null;
            PhotoHelper::attach($product, $data['photoIds'], $featured);
        }

        $product->addParameters($data['parameters']);
        $product->addOptions($data['options']);
        $product->addColours($data['colours']);
        $product->addEndings($data['endings']);

        return response()->json(['message' => ['Product successfully added!']]);
    }

    public function edit(Request $request, Product $product)
    {
        if (!$request->ajax()) {
            return view('admin.product.index', [
                'productCategory' => $product->category,
                'editId' => $product->id
            ]);
        }

        $product->options = $product->options->sortBy('index');

        $categories = Category::getMainCategories()->where('parent_id', null)->all();
        $groups = Group::all();
        $colourGroups = ColourGroup::all();
        $endingGroups = EndingGroup::all();

        return view('admin/product/form', [
            'formTitle' => 'Edit '.$product->name,
            'formUrl' => 'admin/products/'.$product->id,
            'item' => $product,
            'groups' => $groups,
            'categories' => $categories,
            'colourGroups' => $colourGroups,
            'endingGroups' => $endingGroups,
        ]);
    }

    public function update(StoreProductRequest $request, Product $product)
    {
        $data = $request->all();

        $data['customizable'] = isset($data['customizable']) ? $data['customizable'] : 0;
        $data['active'] = isset($data['active']) ? $data['active'] : 0;
        $data['new'] = isset($data['new']) ? $data['new'] : 0;
        $data['out_of_stock'] = isset($data['out_of_stock']) ? $data['out_of_stock'] : 0;

        $product->update($data);
        if (isset($data['photoIds'])) {
            $featured = isset($data['featuredPhotoId']) ? $data['featuredPhotoId'] : null;
            PhotoHelper::attach($product, $data['photoIds'], $featured);
        }

        $product->updateParameters($data['parameters']);
        $product->updateOptions($data['options']);

        $colours = isset($data['colours']) ? $data['colours'] : [];
        $product->updateColours($colours);

        if (isset($data['endings'])) {
            $product->updateEndings($data['endings']);
        }

        return response()->json(['message' => ['Product successfully updated!']]);
    }

    public function destroy(Product $product)
    {

        $product->delete();

        return response()->json(['message' => ['Product successfully deleted!']]);
    }

    public function importPrices(Request $request, Product $product)
    {
        $file = $request->file('prices');
        $excel = new ExcelHelper($file);
        $prices = collect($excel->getPrices());

        $product->updateOptionsFromFile($prices);

        return view('admin.partials.options-list', [
            'options' => $product->options()->get(),
        ]);
    }

    public function parsePrices(Request $request)
    {
        $file = $request->file('prices');
        $excel = new ExcelHelper($file);
        $prices = $excel->getPrices();
        $i = 1;
        foreach ($prices as &$price) {
            $price = json_decode(json_encode($price), false);
            $price->id = $i++;
        }

        return view('admin.partials.options-list', [
            'options' => $prices,
        ]);
    }
}
