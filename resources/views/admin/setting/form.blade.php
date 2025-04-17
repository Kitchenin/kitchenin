@extends('admin.partials.form')

@section('content')

    <div class="row">

        <!-- Name Field -->
        <div class="form-group col-md-4">
            <label for="name">
                <i class="fa fa-asterisk text-danger"></i> Name (Search key):
            </label>
            <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ isset($item) ? $item->name : '' }}"
                    class="form-control"
            />
        </div>

        <!-- Title Field -->
        <div class="form-group col-md-4">
            <label for="title">
                <i class="fa fa-asterisk text-danger"></i> Title (Text):
            </label>
            <input
                    type="text"
                    name="title"
                    id="title"
                    value="{{ isset($item) ? $item->title : '' }}"
                    class="form-control"
            />
        </div>

        <!-- Value Field -->
        <div class="form-group col-md-4">
            <label for="value">
                <i class="fa fa-asterisk text-danger"></i> Value:
            </label>
            <input
                    type="text"
                    name="value"
                    id="value"
                    value="{{ isset($item) ? $item->value : '' }}"
                    class="form-control"
            />
        </div>

    </div>

@endsection