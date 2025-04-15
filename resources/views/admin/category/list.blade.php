<div class="table-responsive">
    @include('admin.partials.ordering-button', ['entity' => 'categories'])
    <table class="table table-striped table-hover" data-list="categories">
        <tbody class="table-sortable">
        @foreach($categories->where('parent_id', null)->all() as $category)

            <tr href="/admin/categories/{{ $category->id }}" class="btn-form" id="tr_{{ $category->id }}" data-id="{{ $category->id }}">
                <td class="actionIconsColumn">
                    <a class="drag-handle"><i class="fa fa-arrows"></i></a>
                </td>
                <td class="actionIconsColumn">
                    <a href="/admin/categories/delete/{{ $category->id }}" class="btn btn-3d btn-xs btn-red btn-item-delete"><i class="fa fa-trash"></i></a>
                </td>
                <td>
                    <b>{{ $category->name }}</b>

                    <table class="table table-striped table-hover table-sortable" style="margin-top: 20px;">
                        <tbody class="table-sortable">
                            @foreach($categories->where('parent_id', $category->id)->all() as $childCategory)
                            <tr href="/admin/categories/{{ $childCategory->id }}" class="btn-form" id="tr_{{ $childCategory->id }}" data-id="{{ $childCategory->id }}">
                                <td class="actionIconsColumn">
                                    <a class="drag-handle"><i class="fa fa-arrows"></i></a>
                                </td>
                                <td class="actionIconsColumn">
                                    <a href="/admin/categories/delete/{{ $childCategory->id }}" class="btn btn-3d btn-xs btn-red btn-item-delete"><i class="fa fa-trash"></i></a>
                                </td>
                                <td style="">{{ $childCategory->name }}</td>
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