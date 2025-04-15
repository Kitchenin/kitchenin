@extends('admin.partials.form')

@section('content')

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">

                <div class="form-group col-md-4">
                    <label for="name"><i class="fa fa-asterisk text-danger"></i> Name:</label>
                    {{ Form::text('name', isset($item) ? $item->name : null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group col-md-4">
                    <label for="colour_group_id">Group:</label>
                    <select name="colour_group_id" class="form-control">
                        <option value=""></option>
                        @foreach($colourGroups as $group)
                            <option value="{{ $group->id }}" {{  isset($item) && $item->colour_group_id == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="active">Active:</label>
                    <input type="checkbox" name="active" id="active" value="1" {{ !isset($item) || (isset($item) && $item->active) ? 'checked' : '' }} />
                </div>

            </div>

        </div>
    </div>


    @include('admin.partials.photoupload', ['type' => 'colours', 'item' => isset($item) ? $item : null])


@endsection