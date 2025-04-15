<div class="table-responsive">
    @include('admin.partials.ordering-button', ['entity' => 'products'])
    <table class="table table-hover table-bordered table-striped" data-list="products">
        <thead>
            <tr>
                <th></th>
                <th><i class="fa fa-bolt pull-right hidden-xs"></i></th>
                <th><i class="fa fa-camera pull-right hidden-xs"></i> Pic</th>
                <th><i class="fa fa-cube pull-right hidden-xs"></i> Name</th>
            </tr>
        </thead>
        <tbody class="table-sortable">
        @foreach($products as $product)
            <tr href="/admin/products/{{ $product->id }}" class="btn-form" id="tr_{{ $product->id }}" data-id="{{ $product->id }}">
                <td class="actionIconsColumn">
                    <a class="drag-handle"><i class="fa fa-arrows"></i></a>
                </td>
                <td class="actionIconsColumn">
                    <a href="/admin/products/delete/{{ $product->id }}" class="btn btn-3d btn-xs btn-red btn-item-delete"><i class="fa fa-trash"></i></a>
                </td>
                <td><img src="{{ $product->getFirstPhoto() }}" class="admin-thumbnail" /></td>
                <td>{{ $product->name }}</td>
            </tr>

        @endforeach
        </tbody>
    </table>
</div>