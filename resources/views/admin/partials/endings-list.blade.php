<table class="table table-hover table-bordered table-striped">
    <tbody>
    @foreach($endings as $ending)
        <tr data-id="{{ $ending->id }}">
            <td>
                <img src="{{ $ending->getFirstPhoto() }}" class="admin-thumbnail" alt="Ending Image" />
            </td>
            <td>
                {{ $ending->name }}
                <input
                        type="hidden"
                        name="endings[{{ $ending->id }}]"
                        value="{{ $ending->id }}"
                />
            </td>
        </tr>
    @endforeach
    </tbody>
</table>