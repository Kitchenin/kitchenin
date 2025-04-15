<div class="table-responsive">
    <table class="table table-hover table-bordered table-striped">
        <tbody>
        @if ($noGroupEndings->count())
            <tr>
                <td><b>NO GROUP SET</b></td>
                <td>
                    <table class="table table-hover table-bordered table-striped">
                        <tbody>
                        @foreach($noGroupEndings as $ending)
                            <tr href="/admin/endings/{{ $ending->id }}" class="btn-form" data-id="{{ $ending->id }}">
                                <td class="actionIconsColumn">
                                    <a href="/admin/endings/delete/{{ $ending->id }}" class="btn btn-3d btn-xs btn-red btn-item-delete"><i class="fa fa-trash"></i></a>
                                </td>
                                <td><img src="{{ $ending->getFirstPhoto() }}" class="admin-thumbnail" /></td>
                                <td>{{ $ending->name }}</td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
        @endif
        @foreach($endingGroups as $endingGroup)
            <tr>
                <td>{{ $endingGroup->name }}</td>
                <td>
                    @include('admin.partials.ordering-button', ['entity' => 'endings'])
                    <table class="table table-hover table-bordered table-striped" data-list="endings">
                        <tbody class="table-sortable">
                        @foreach($endingGroup->endings as $ending)
                            <tr href="/admin/endings/{{ $ending->id }}" class="btn-form" data-id="{{ $ending->id }}">
                                <td class="actionIconsColumn">
                                    <a class="drag-handle"><i class="fa fa-arrows"></i></a>
                                </td>
                                <td class="actionIconsColumn">
                                    <a href="/admin/endings/delete/{{ $ending->id }}" class="btn btn-3d btn-xs btn-red btn-item-delete"><i class="fa fa-trash"></i></a>
                                </td>
                                <td><img src="{{ $ending->getFirstPhoto() }}" class="admin-thumbnail" /></td>
                                <td>{{ $ending->name }}</td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>