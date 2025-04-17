@extends('admin.partials.form')

@section('content')

    <div class="row">
        <!-- Name Field -->
        <div class="form-group col-md-4">
            <label for="name">
                <i class="fa fa-asterisk text-danger"></i> Name:
            </label>
            <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ isset($item) ? $item->name : '' }}"
                    class="form-control"
                    required
            />
        </div>
    </div>

@endsection