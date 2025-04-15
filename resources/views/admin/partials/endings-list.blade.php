<table class="table table-hover table-bordered table-striped">
    <tbody>
    @foreach($endings as $ending)
        <tr data-id="{{ $ending->id }}">
            <td><img src="{{ $ending->getFirstPhoto() }}" class="admin-thumbnail" /></td>
            <td>{{ $ending->name }}{{ Form::hidden('endings['.$ending->id.']', $ending->id) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>