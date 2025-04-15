@extends('admin.partials.form')

@section('content')

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">

                <div class="form-group col-md-6">
                    <label for="title"><i class="fa fa-asterisk text-danger"></i> Title:</label>
                    {{ Form::text('title', isset($item) ? $item->title : null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group col-md-6">
                    <label for="slug"><i class="fa fa-asterisk text-danger"></i> Slug:</label>
                    {{ Form::text('slug', isset($item) ? $item->slug : null, ['class' => 'form-control']) }}
                </div>

            </div>

        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="excerpt">Short Description:</label>
                    {{ Form::textarea('excerpt',  isset($item) ? $item->excerpt : null, ['id' => 'excerpt','class' => 'form-control ckeditor', 'rows' => 4]) }}
                </div>
            </div>


            <div class="row">
                <div class="form-group col-md-12">
                    <label for="content">Full Text:</label>
                    {{ Form::textarea('content',  isset($item) ? $item->content : null, ['id' => 'content','class' => 'form-control ckeditor', 'rows' => 10]) }}
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="page_title">Page Title:</label>
                    {{ Form::textarea('page_title',  isset($item) ? $item->page_title : null, ['id' => 'page_title','class' => 'form-control', 'rows' => 4]) }}
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="meta_description">Meta Description:</label>
                    {{ Form::textarea('meta_description',  isset($item) ? $item->meta_description : null, ['id' => 'meta_description','class' => 'form-control', 'rows' => 4]) }}
                </div>
            </div>
        </div>
    </div>

    @include('admin.partials.photoupload', ['type' => 'articles', 'item' => isset($item) ? $item : null])

@endsection
