<div class="table-responsive">
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th><i class="fa fa-bolt pull-right hidden-xs"></i></th>
                <th><i class="fa fa-cube pull-right hidden-xs"></i> Title</th>
                <th><i class="fa fa-cube pull-right hidden-xs"></i> Slug</th>
                <th><i class="fa fa-cube pull-right hidden-xs"></i> Insights</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pages as $page)
            <tr href="/admin/pages/{{ $page->id }}" class="btn-form" id="tr_{{ $page->id }}">
                <td class="actionIconsColumn">
                    <a href="/admin/pages/delete/{{ $page->id }}" class="btn btn-3d btn-xs btn-red btn-item-delete"><i class="fa fa-trash"></i></a>
                </td>
                <td>{{ $page->title }}</td>
                <td>{{ $page->slug }}</td>
                <td>{{ $page->insights ? 'Yes' : '' }}</td>
            </tr>

        @endforeach
        </tbody>
    </table>
</div>
