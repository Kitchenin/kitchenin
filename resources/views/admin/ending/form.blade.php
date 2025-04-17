@extends('admin.partials.form')

@section('content')

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">

                <div class="form-group col-md-4">
                    <label for="name"><i class="fa fa-asterisk text-danger"></i> Name:</label>
                    <input
                            type="text"
                            name="name"
                            id="name"
                            value="{{ isset($item) ? $item->name : old('name') }}"
                            class="form-control"
                    >
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label for="ending_group_id">Group:</label>
                    <select name="ending_group_id" id="ending_group_id" class="form-control">
                        <option value=""></option>
                        @foreach($endingGroups as $group)
                            <option value="{{ $group->id }}"
                                    {{ (old('ending_group_id') == $group->id) || (isset($item) && $item->ending_group_id == $group->id) ? 'selected' : '' }}>
                                {{ $group->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('ending_group_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label for="active">Active:</label>
                    <input
                            type="checkbox"
                            name="active"
                            id="active"
                            value="1"
                            {{ (!isset($item) || (isset($item) && $item->active)) ? 'checked' : '' }}
                    >
                </div>

            </div>

        </div>
    </div>

    @include('admin.partials.photoupload', ['type' => 'endings', 'item' => $item ?? null])

@endsection