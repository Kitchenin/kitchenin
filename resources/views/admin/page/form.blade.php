@extends('admin.partials.form')

@section('content')

    <!-- Panel for Title and Slug -->
    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">

                <!-- Title Field -->
                <div class="form-group col-md-6">
                    <label for="title">
                        <i class="fa fa-asterisk text-danger"></i> Title:
                    </label>
                    <input
                            type="text"
                            name="title"
                            id="title"
                            value="{{ isset($item) ? $item->title : '' }}"
                            class="form-control"
                    />
                </div>

                <!-- Slug Field -->
                <div class="form-group col-md-6">
                    <label for="slug">
                        <i class="fa fa-asterisk text-danger"></i> Slug:
                    </label>
                    <input
                            type="text"
                            name="slug"
                            id="slug"
                            value="{{ isset($item) ? $item->slug : '' }}"
                            class="form-control"
                    />
                </div>

            </div>

        </div>
    </div>

    <!-- Panel for Descriptions and Content -->
    <div class="panel panel-default">
        <div class="panel-body">

            <!-- Short Description -->
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="short_description">Short Description:</label>
                    <textarea
                            name="short_description"
                            id="short_description"
                            class="form-control ckeditor"
                            rows="4"
                    >{{ isset($item) ? $item->short_description : '' }}</textarea>
                </div>
            </div>

            <!-- Full Text -->
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="content">Full Text:</label>
                    <textarea
                            name="content"
                            id="content"
                            class="form-control ckeditorExtended"
                            rows="50"
                    >{{ isset($item) ? $item->content : '' }}</textarea>
                </div>
            </div>

            <!-- Meta Description -->
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="meta_description">Meta Description:</label>
                    <textarea
                            name="meta_description"
                            id="meta_description"
                            class="form-control"
                            rows="4"
                    >{{ isset($item) ? $item->meta_description : '' }}</textarea>
                </div>
            </div>

            <!-- Show in Insights Checkbox -->
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="insights">Show in insights:</label>
                    <input
                            type="checkbox"
                            name="insights"
                            id="insights"
                            value="1"
                            {{ !isset($item) || (isset($item) && $item->insights) ? 'checked' : '' }}
                    />
                </div>
            </div>

        </div>
    </div>

@endsection