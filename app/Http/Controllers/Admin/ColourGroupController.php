<?php

namespace App\Http\Controllers\Admin;

use App\ColourGroup;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreColourGroupRequest;
use Illuminate\Http\Request;

class ColourGroupController extends Controller
{

    public function index()
    {
        return view('admin.colourgroup.index');
    }

    public function listAll()
    {
        $colourGroups = ColourGroup::all();
        return view('admin.colourgroup.list', [
            'colourGroups' => $colourGroups
        ]);
    }

    public function listColours(ColourGroup $colourGroup)
    {
        $colours = $colourGroup->colours()->get();
        return view('admin.partials.colours-list', [
            'colours' => $colours
        ]);
    }

    public function create()
    {
        return view('admin/colourgroup/form', [
            'formTitle' => 'New colour group',
            'formUrl' => 'admin/colourgroups',
        ]);
    }

    public function store(StoreColourGroupRequest $request)
    {
        $data = $request->all();

        ColourGroup::create($data);

        return response()->json(['message' => ['ColourGroup is successfully added!']]);
    }

    public function edit(Request $request, ColourGroup $colourGroup)
    {
        if (!$request->ajax()) {
            return view('admin.colourgroup.index', [
                'editId' => $colourGroup->id
            ]);
        }

        $colourGroups = ColourGroup::all();

        return view('admin/colourgroup/form', [
            'formTitle' => 'Edit '.$colourGroup->name,
            'formUrl' => 'admin/colourgroups/'.$colourGroup->id,
            'item' => $colourGroup,
            'colourGroups' => $colourGroups,
        ]);
    }

    public function update(StoreColourGroupRequest $request, ColourGroup $colourGroup)
    {
        $data = $request->all();

        $colourGroup->update($data);

        return response()->json(['message' => ['Colour group is successfully updated!']]);
    }

    public function destroy(ColourGroup $colourGroup)
    {
        $colourGroup->delete();

        return redirect('admin/colourgroups')->withMessage('Colour group was deleted!');
    }
}
