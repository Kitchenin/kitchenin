<?php

namespace App\Http\Controllers\Admin;

use App\EndingGroup;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEndingGroupRequest;
use Illuminate\Http\Request;

class EndingGroupController extends Controller
{

    public function index()
    {
        return view('admin.endinggroup.index');
    }

    public function listAll()
    {
        $endingGroups = EndingGroup::all();
        return view('admin.endinggroup.list', [
            'endingGroups' => $endingGroups
        ]);
    }

    public function listEndings(EndingGroup $endingGroup)
    {
        $endings = $endingGroup->endings()->get();
        return view('admin.partials.endings-list', [
            'endings' => $endings
        ]);
    }

    public function create()
    {
        return view('admin/endinggroup/form', [
            'formTitle' => 'New ending group',
            'formUrl' => 'admin/endinggroups',
        ]);
    }

    public function store(StoreEndingGroupRequest $request)
    {
        $data = $request->all();

        EndingGroup::create($data);

        return response()->json(['message' => ['Ending Group is successfully added!']]);
    }

    public function edit(Request $request, EndingGroup $endingGroup)
    {
        if (!$request->ajax()) {
            return view('admin.endinggroup.index', [
                'editId' => $endingGroup->id
            ]);
        }

        $endingGroups = EndingGroup::all();

        return view('admin/endinggroup/form', [
            'formTitle' => 'Edit '.$endingGroup->name,
            'formUrl' => 'admin/endinggroups/'.$endingGroup->id,
            'item' => $endingGroup,
            'endingGroups' => $endingGroups,
        ]);
    }

    public function update(StoreEndingGroupRequest $request, EndingGroup $endingGroup)
    {
        $data = $request->all();

        $endingGroup->update($data);

        return response()->json(['message' => ['Ending group is successfully updated!']]);
    }

    public function destroy(EndingGroup $endingGroup)
    {
        $endingGroup->delete();

        return redirect('admin/endinggroups')->withMessage('Ending group was deleted!');
    }
}
