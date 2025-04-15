<div id="groupedColoursList" class="table-responsive">
    <table class="table table-hover table-bordered table-striped">
        <tbody>
            @if ($noGroupColours->count())
                <tr>
                    <td class="groupedColoursList__toggle" style="vertical-align: top; cursor: pointer; font-weight: 700;">NO GROUP SET</td>
                    <td>
                        <table class="table table-hover table-bordered table-striped" style="display: none;">
                            <tbody class="table-sortable">
                            @foreach($noGroupColours as $colour)
                                <tr href="/admin/colours/{{ $colour->id }}" class="btn-form" data-id="{{ $colour->id }}">
                                    <td class="actionIconsColumn">
                                        <a href="/admin/colours/delete/{{ $colour->id }}" class="btn btn-3d btn-xs btn-red btn-item-delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                    <td><img src="{{ $colour->getFirstPhoto() }}" class="admin-thumbnail" /></td>
                                    <td>{{ $colour->name }}</td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
            @endif
            @foreach($colourGroups as $colourGroup)
                <tr>
                    <td class="groupedColoursList__toggle" style="vertical-align: top; cursor: pointer;">{{ $colourGroup->name }}</td>
                    <td>
                        @include('admin.partials.ordering-button', ['entity' => 'colours'])
                        <table class="table table-hover table-bordered table-striped" data-list="colours" style="display: none;">
                            <tbody class="table-sortable">
                            @foreach($colourGroup->colours as $colour)
                                <tr href="/admin/colours/{{ $colour->id }}" class="btn-form" data-id="{{ $colour->id }}">
                                    <td class="actionIconsColumn">
                                        <a class="drag-handle"><i class="fa fa-arrows"></i></a>
                                    </td>
                                    <td class="actionIconsColumn">
                                        <a href="/admin/colours/delete/{{ $colour->id }}" class="btn btn-3d btn-xs btn-red btn-item-delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                    <td><img src="{{ $colour->getFirstPhoto() }}" class="admin-thumbnail" /></td>
                                    <td>{{ $colour->name }}</td>
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
