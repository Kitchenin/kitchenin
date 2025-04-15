<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGroupRequest;
use Illuminate\Http\Request;

class GroupController extends Controller
{

    public function index()
    {
        return view('admin.group.index');
    }

    public function listAll()
    {
        $groups = Group::all();
        return view('admin.group.list', [
            'groups' => $groups
        ]);
    }

    public function create()
    {
        return view('admin/group/form', [
            'formTitle' => 'New group',
            'formUrl' => 'admin/groups',
        ]);
    }

    public function store(StoreGroupRequest $request)
    {
        $data = $request->all();

        Group::create($data);

        return response()->json(['message' => ['Group is successfully added!']]);
    }

    public function edit(Request $request, Group $group)
    {
        if (!$request->ajax()) {
            return view('admin.group.index', [
                'editId' => $group->id
            ]);
        }

        $groups = Group::all();

        return view('admin/group/form', [
            'formTitle' => 'Edit '.$group->name,
            'formUrl' => 'admin/groups/'.$group->id,
            'item' => $group,
            'groups' => $groups,
        ]);
    }

    public function update(StoreGroupRequest $request, Group $group)
    {
        $data = $request->all();

        $group->update($data);

        return response()->json(['message' => ['Group is successfully updated!']]);
    }

    public function destroy(Group $group)
    {
        $group->delete();

        return redirect('admin/groups')->withMessage('Group was deleted!');
    }
}
