@extends('admin.partials.form')

@section('content')

    <div class="row">

        <div class="form-group col-md-4">
            <label for="name"><i class="fa fa-asterisk text-danger"></i> Name (Search key):</label>
            {{ Form::text('name', isset($item) ? $item->name : null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group col-md-4">
            <label for="title"><i class="fa fa-asterisk text-danger"></i> Title (Text):</label>
            {{ Form::text('title', isset($item) ? $item->title : null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group col-md-4">
            <label for="value"><i class="fa fa-asterisk text-danger"></i> Value:</label>
            {{ Form::text('value', isset($item) ? $item->value : null, ['class' => 'form-control']) }}
        </div>

    </div>

@endsection