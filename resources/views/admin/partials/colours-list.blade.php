<table class="table table-hover table-bordered table-striped">
    <tbody>
    @foreach($colours as $colour)
        <tr data-id="{{ $colour->id }}">
            <td><img src="{{ $colour->getFirstPhoto() }}" class="admin-thumbnail" /></td>
            <td>{{ $colour->name }}</td>
            <td>{{ Form::text('colours['.$colour->id.'][price]', isset($colour->pivot->price) ? $colour->pivot->price : null, ['class' => 'form-control']) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>