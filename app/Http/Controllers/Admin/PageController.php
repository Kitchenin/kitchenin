<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePageRequest;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index()
    {
        return view('admin.page.index');
    }

    public function listAll()
    {
        $pages = Page::all();
        return view('admin.page.list', [
            'pages' => $pages
        ]);
    }

    public function create()
    {
        return view('admin.page.form', [
            'formTitle' => 'New page',
            'formUrl' => 'admin/pages',
        ]);
    }

    public function store(StorePageRequest $request)
    {
        $data = $request->all();

        Page::create($data);

        return response()->json(['message' => ['Page is successfully added!']]);
    }

    public function edit(Request $request, Page $page)
    {
        if (!$request->ajax()) {
            return view('admin.page.index', [
                'editId' => $page->id
            ]);
        }

        return view('admin.page.form', [
            'formTitle' => 'Edit '.$page->name,
            'formUrl' => 'admin/pages/'.$page->id,
            'item' => $page,
        ]);
    }

    public function update(StorePageRequest $request, Page $page)
    {
        $data = $request->all();

        $page->update($data);

        return response()->json(['message' => ['Page is successfully updated!']]);
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return redirect('admin/pages')->withMessage('Page was deleted!');
    }
}
