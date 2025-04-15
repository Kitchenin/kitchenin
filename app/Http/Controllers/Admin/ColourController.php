<?php

namespace App\Http\Controllers\Admin;

use App\Colour;
use App\ColourGroup;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreColourRequest;
use App\Helpers\PhotoHelper;


class ColourController extends Controller
{

    public function index()
    {
        return view('admin.colour.index');
    }

    public function listAll()
    {
        $colourGroups = ColourGroup::with('colours')->get();
        $noGroupColours = Colour::whereNull('colour_group_id')->get();
        return view('admin.colour.list', [
            'colourGroups' => $colourGroups,
            'noGroupColours' => $noGroupColours,
        ]);
    }

    public function create()
    {
        $colourGroups = ColourGroup::all();
        return view('admin.colour.form', [
            'formTitle' => 'New colour',
            'formUrl' => 'admin/colours',
            'colourGroups' => $colourGroups
        ]);
    }

    public function store(StoreColourRequest $request)
    {
        $data = $request->all();

        $colour = Colour::create($data);

        $colour->addToProducts($data['colour_group_id']);

        if (isset($data['photoIds'])) {
            $featured = isset($data['featuredPhotoId']) ? $data['featuredPhotoId'] : null;
            PhotoHelper::attach($colour, $data['photoIds'], $featured);
        }

        return response()->json(['message' => ['Colour successfully added!']]);
    }

    public function edit(Colour $colour)
    {
        $colourGroups = ColourGroup::all();
        return view('admin.colour.form', [
            'formTitle' => 'Edit '.$colour->name,
            'formUrl' => 'admin/colours/'.$colour->id,
            'item' => $colour,
            'colourGroups' => $colourGroups
        ]);
    }

    public function update(StoreColourRequest $request, Colour $colour)
    {
        $data = $request->all();

        $data['active'] = isset($data['active']) ? $data['active'] : 0;

        $oldGroupId = $colour->colour_group_id;

        if ($data['colour_group_id'] > 0 && $oldGroupId != $data['colour_group_id']) {
            $colour->products()->detach();
        }

        $colour->addToProducts($data['colour_group_id']);

        $colour->update($data);

        if (isset($data['photoIds'])) {
            $featured = isset($data['featuredPhotoId']) ? $data['featuredPhotoId'] : null;
            PhotoHelper::attach($colour, $data['photoIds'], $featured);
        }

        return response()->json(['message' => ['Colour successfully updated!']]);
    }

    public function destroy(Colour $colour)
    {
        $colour->delete();

        return response()->json(['message' => ['Colour successfully deleted!']]);
    }

}
