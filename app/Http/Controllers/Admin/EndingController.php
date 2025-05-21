<?php

namespace App\Http\Controllers\Admin;

use App\Ending;
use App\EndingGroup;
use App\Helpers\PhotoHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEndingRequest;


class EndingController extends Controller
{

    public function index()
    {
        return view('admin.ending.index');
    }

    public function listAll()
    {
        $endingGroups = EndingGroup::with('endings')->get();
        $noGroupEndings = Ending::whereNull('ending_group_id')->get();
        return view('admin.ending.list', [
            'endingGroups' => $endingGroups,
            'noGroupEndings' => $noGroupEndings,
        ]);
    }

    public function create()
    {
        $endingGroups = EndingGroup::all();
        return view('admin.ending.form', [
            'formTitle' => 'New ending',
            'formUrl' => 'admin/endings',
            'endingGroups' => $endingGroups,
        ]);
    }

    public function store(StoreEndingRequest $request)
    {
        $data = $request->all();

        $ending = Ending::create($data);

        if (isset($data['photoIds'])) {
            $featured = isset($data['featuredPhotoId']) ? $data['featuredPhotoId'] : null;
            PhotoHelper::attach($ending, $data['photoIds'], $featured);
        }

        return response()->json(['message' => ['Ending successfully added!']]);
    }

    public function edit(Ending $ending)
    {
        $endingGroups = EndingGroup::all();
        return view('admin.ending.form', [
            'formTitle' => 'Edit '.$ending->name,
            'formUrl' => 'admin/endings/'.$ending->id,
            'item' => $ending,
            'endingGroups' => $endingGroups,
        ]);
    }

    public function update(StoreEndingRequest $request, Ending $ending)
    {
        $data = $request->all();

        $data['active'] = isset($data['active']) ? $data['active'] : 0;

        $ending->update($data);

        if (isset($data['photoIds'])) {
            $featured = isset($data['featuredPhotoId']) ? $data['featuredPhotoId'] : null;
            PhotoHelper::attach($ending, $data['photoIds'], $featured);
        }

        return response()->json(['message' => ['Ending successfully updated!']]);
    }

    public function destroy(Ending $ending)
    {
        $ending->delete();

        return response()->json(['message' => ['Ending successfully deleted!']]);
    }

}
