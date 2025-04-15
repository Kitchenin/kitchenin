<div class="table-responsive">
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th><i class="fa fa-bolt pull-right hidden-xs"></i></th>
                <th><i class="fa fa-cube pull-right hidden-xs"></i> Title</th>
                <th><i class="fa fa-cube pull-right hidden-xs"></i> Slug</th>
            </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr href="/admin/articles/{{ $article->id }}" class="btn-form" id="tr_{{ $article->id }}">
                <td class="actionIconsColumn">
                    <a href="/admin/articles/delete/{{ $article->id }}" class="btn btn-3d btn-xs btn-red btn-item-delete"><i class="fa fa-trash"></i></a>
                </td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->slug }}</td>
            </tr>

        @endforeach
        </tbody>
    </table>
</div>
