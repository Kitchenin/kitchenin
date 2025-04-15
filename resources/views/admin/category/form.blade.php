@extends('admin.partials.form')

@section('content')

    <div class="row">

        <div class="form-group col-md-4">
            <label for="name"><i class="fa fa-asterisk text-danger"></i> Name:</label>
            {{ Form::text('name', isset($item) ? $item->name : null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group col-md-4">
            <label for="parent_id">Main Category:</label>
            {{ Form::select('parent_id', ['' => 'NONE'] + $categories->pluck('name', 'id')->all(), isset($item) ? $item->parent_id : null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group col-md-3">
            <label for="order"> Order:</label>
            {{ Form::text('order', isset($item) ? $item->order : null, ['class' => 'form-control']) }}
        </div>

    </div>

    <div class="row">

        <div class="form-group col-md-4">
            <label for="slug"><i class="fa fa-asterisk text-danger"></i> Slug:</label>
            {{ Form::text('slug', isset($item) ? $item->slug : null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group col-md-4">
            <label for="h1">H1:</label>
            {{ Form::text('h1', isset($item) ? $item->h1 : null, ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12">
            <label for="description">Description:</label>
            {{ Form::textarea('description',  isset($item) ? $item->description : '', ['id' => 'description', 'class' => 'form-control ckeditor', 'rows' => 8]) }}
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12">
            <label for="page_title">Page Title:</label>
            {{ Form::text('page_title', isset($item) ? $item->page_title : null, ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12">
            <label for="meta_description">Meta Description:</label>
            {{ Form::text('meta_description', isset($item) ? $item->meta_description : null, ['class' => 'form-control']) }}
        </div>
    </div>

    @include('admin.partials.photoupload', ['type' => 'categories', 'item' => isset($item) ? $item : null])

@endsection
