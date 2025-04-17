<table class="table table-hover table-bordered table-striped">
    <tbody>
    @foreach($colours as $colour)
        <tr data-id="{{ $colour->id }}">
            <td><img src="{{ $colour->getFirstPhoto() }}" class="admin-thumbnail" /></td>
            <td>{{ $colour->name }}</td>
            <td>
                <input
                        type="text"
                        name="colours[{{ $colour->id }}][price]"
                        value="{{ old('colours.'.$colour->id.'.price', $colour->pivot->price ?? '') }}"
                        class="form-control"
                >
            </td>
        </tr>
    @endforeach
    </tbody>
</table>