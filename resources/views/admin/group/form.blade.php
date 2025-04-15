@extends('admin.partials.form')

@section('content')

    <div class="row">

        <div class="form-group col-md-4">
            <label for="name"><i class="fa fa-asterisk text-danger"></i> Name:</label>
            {{ Form::text('name', isset($item) ? $item->name : null, ['class' => 'form-control']) }}
        </div>

    </div>

@endsection