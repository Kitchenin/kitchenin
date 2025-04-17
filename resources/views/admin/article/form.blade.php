@extends('admin.partials.form')

@section('content')

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">

                <div class="form-group col-md-6">
                    <label for="title"><i class="fa fa-asterisk text-danger"></i> Title:</label>
                    <input
                            type="text"
                            name="title"
                            id="title"
                            value="{{ isset($item) ? $item->title : old('title') }}"
                            class="form-control"
                    >
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="slug"><i class="fa fa-asterisk text-danger"></i> Slug:</label>
                    <input
                            type="text"
                            name="slug"
                            id="slug"
                            value="{{ isset($item) ? $item->slug : old('slug') }}"
                            class="form-control"
                    >
                    @error('slug')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>

        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="excerpt">Short Description:</label>
                    <textarea
                            name="excerpt"
                            id="excerpt"
                            class="form-control ckeditor"
                            rows="4"
                    >{{ isset($item) ? $item->excerpt : old('excerpt') }}</textarea>
                    @error('excerpt')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="content">Full Text:</label>
                    <textarea
                            name="content"
                            id="content"
                            class="form-control ckeditor"
                            rows="10"
                    >{{ isset($item) ? $item->content : old('content') }}</textarea>
                    @error('content')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="page_title">Page Title:</label>
                    <textarea
                            name="page_title"
                            id="page_title"
                            class="form-control"
                            rows="4"
                    >{{ isset($item) ? $item->page_title : old('page_title') }}</textarea>
                    @error('page_title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="meta_description">Meta Description:</label>
                    <textarea
                            name="meta_description"
                            id="meta_description"
                            class="form-control"
                            rows="4"
                    >{{ isset($item) ? $item->meta_description : old('meta_description') }}</textarea>
                    @error('meta_description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    @include('admin.partials.photoupload', ['type' => 'articles', 'item' => $item ?? null])

@endsection