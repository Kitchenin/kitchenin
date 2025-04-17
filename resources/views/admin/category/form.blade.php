@extends('admin.partials.form')

@section('content')

    <div class="row">

        <div class="form-group col-md-4">
            <label for="name"><i class="fa fa-asterisk text-danger"></i> Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $item->name ?? '') }}" class="form-control">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-4">
            <label for="parent_id">Main Category:</label>
            <select id="parent_id" name="parent_id" class="form-control">
                <option value="">NONE</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ (old('parent_id', $item->parent_id ?? '') == $category->id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('parent_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-3">
            <label for="order">Order:</label>
            <input type="text" id="order" name="order" value="{{ old('order', $item->order ?? '') }}" class="form-control">
            @error('order')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

    </div>

    <div class="row">

        <div class="form-group col-md-4">
            <label for="slug"><i class="fa fa-asterisk text-danger"></i> Slug:</label>
            <input type="text" id="slug" name="slug" value="{{ old('slug', $item->slug ?? '') }}" class="form-control">
            @error('slug')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-4">
            <label for="h1">H1:</label>
            <input type="text" id="h1" name="h1" value="{{ old('h1', $item->h1 ?? '') }}" class="form-control">
            @error('h1')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

    </div>

    <div class="row">
        <div class="form-group col-md-12">
            <label for="description">Description:</label>
            <textarea id="description" name="description" class="form-control ckeditor" rows="8">{{ old('description', $item->description ?? '') }}</textarea>
            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12">
            <label for="page_title">Page Title:</label>
            <input type="text" id="page_title" name="page_title" value="{{ old('page_title', $item->page_title ?? '') }}" class="form-control">
            @error('page_title')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-12">
            <label for="meta_description">Meta Description:</label>
            <input type="text" id="meta_description" name="meta_description" value="{{ old('meta_description', $item->meta_description ?? '') }}" class="form-control">
            @error('meta_description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    @include('admin.partials.photoupload', ['type' => 'categories', 'item' => isset($item) ? $item : null])

@endsection