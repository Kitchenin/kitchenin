<div class="table-responsive">

    <table class="table table-striped table-hover" data-list="groups">
        <tbody class="table-sortable">
        @foreach($endingGroups as $group)

            <tr href="/admin/endinggroups/{{ $group->id }}" class="btn-form" id="tr_{{ $group->id }}" data-id="{{ $group->id }}" data-type="category">
                <td class="actionIconsColumn">
                    <a href="/admin/endinggroups/delete/{{ $group->id }}" class="btn btn-3d btn-xs btn-red btn-item-delete" data-type="category"><i class="fa fa-trash"></i></a>
                </td>
                <td><b>{{ $group->name }}</b></td>
            </tr>

        @endforeach
        </tbody>
    </table>
</div>