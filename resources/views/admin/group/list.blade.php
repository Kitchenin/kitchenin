<div class="table-responsive">
    @include('admin.partials.ordering-button', ['entity' => 'groups'])
    <table class="table table-striped table-hover" data-list="groups">
        <tbody class="table-sortable">
        @foreach($groups as $group)

            <tr href="/admin/groups/{{ $group->id }}" class="btn-form" id="tr_{{ $group->id }}" data-id="{{ $group->id }}">
                <td class="actionIconsColumn">
                    <a class="drag-handle"><i class="fa fa-arrows"></i></a>
                </td>
                <td class="actionIconsColumn">
                    <a href="/admin/groups/delete/{{ $group->id }}" class="btn btn-3d btn-xs btn-red btn-item-delete"><i class="fa fa-trash"></i></a>
                </td>
                <td><b>{{ $group->name }}</b></td>
            </tr>

        @endforeach
        </tbody>
    </table>
</div>