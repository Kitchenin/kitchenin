@extends('admin.partials.form')

@section('content')

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">

                <div class="form-group col-md-4">
                    <label for="name"><i class="fa fa-asterisk text-danger"></i> Name:</label>
                    {{ Form::text('name', isset($item) ? $item->name : null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group col-md-4">
                    <label for="name">Category:</label>
                    <select name="category_id" class="form-control" id="product-category" data-id="{{ isset($item) ? $item->id : 0 }}">
                        <option value=""></option>
                        @foreach($categories as $parentCategory)
                            <option value="{{ $parentCategory->id }}" {{ ( (isset($item) && $item->category_id == $parentCategory->id) || (!isset($item) && $category->id == $parentCategory->id) ) ? 'selected' : '' }}>--- {{ $parentCategory->name }} ---</option>
                            @foreach($parentCategory->children()->get() as $childCategory)
                                <option value="{{ $childCategory->id }}" {{ ( (isset($item) && $item->category_id == $childCategory->id) || (!isset($item) && $category->id == $childCategory->id) ) ? 'selected' : '' }}>{{ $childCategory->name }}</option>
                            @endforeach
                            <option></option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="name">Group:</label>
                    <select name="group_id" class="form-control">
                        <option value=""></option>
                        @foreach($groups as $group)
                            <option value="{{ $group->id }}" {{  isset($item) && $item->group_id == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="row">

                <div class="form-group col-md-4">
                    <label for="slug">Slug (in the url):</label>
                    {{ Form::text('slug', isset($item) ? $item->slug : null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group col-md-4">
                    <label for="sku">SKU:</label>
                    {{ Form::text('sku', isset($item) ? $item->sku : null, ['class' => 'form-control']) }}
                </div>



            </div>

            <div class="row">

                <div class="form-group col-md-4">
                    <label for="price"><i class="fa fa-asterisk text-danger"></i> Price:</label>
                    {{ Form::text('price', isset($item) ? $item->price : null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group col-md-4">
                    <label for="price">Sample Door Price:</label>
                    {{ Form::text('sample_price', isset($item) ? $item->sample_price : null, ['class' => 'form-control']) }}
                </div>


            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label for="active">Active:</label>
                    <input type="checkbox" name="active" id="active" value="1" {{ !isset($item) || (isset($item) && $item->active) ? 'checked' : '' }} />
                </div>

                <div class="form-group col-md-4">
                    <label for="customizable">Custom Size:</label>
                    <input type="checkbox" name="customizable" id="customizable" value="1" {{ isset($item) && $item->customizable ? 'checked' : '' }} />
                </div>

                <div class="form-group col-md-4">
                    <label for="new">New:</label>
                    <input type="checkbox" name="new" id="new" value="1" {{ isset($item) && $item->new ? 'checked' : '' }} />
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label for="delivery">Delivery:</label>
                    {{ Form::text('delivery', isset($item) ? $item->delivery : null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group col-md-4">
                    <label for="dispatch">Dispatch:</label>
                    {{ Form::text('dispatch', isset($item) ? $item->dispatch : null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group col-md-4">
                    <label for="out_of_stock">Out of stock:</label>
                    <input type="checkbox" name="out_of_stock" id="out_of_stock" value="1" {{ isset($item) && $item->out_of_stock ? 'checked' : '' }} />
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label for="rating">Rating:</label>
                    {{ Form::text('rating', isset($item) ? $item->rating : null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group col-md-4">
                    <label for="ratings_count">Ratings count:</label>
                    {{ Form::text('ratings_count', isset($item) ? $item->ratings_count : null, ['class' => 'form-control']) }}
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

        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">

                <div class="form-group col-md-12">
                    <label for="description">Description:</label>
                    {{ Form::textarea('description',  isset($item) ? $item->description : null, ['id' => 'description','class' => 'form-control ckeditor', 'rows' => 8]) }}
                </div>
            </div>


        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">

                <div class="form-group col-md-4">
                    <label for="colour_group_id">Colour Group:</label>
                    <select name="colour_group_id" class="form-control" id="colour_group_id_select">
                        <option value=""></option>
                        @foreach($colourGroups as $group)
                            <option value="{{ $group->id }}" {{  isset($item) && $item->getColourGroup() == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div id="colour_prices_field">
                @if (isset($item))
                    @include('admin.partials.colours-list', ['colours' => $item->colours()->get()])
                @endif
            </div>

        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">

                <div class="form-group col-md-4">
                    <label for="ending_group_id">Ending Group:</label>
                    <select name="ending_group_id" class="form-control" id="ending_group_id_select">
                        <option value=""></option>
                        @foreach($endingGroups as $group)
                            <option value="{{ $group->id }}" {{  isset($item) && $item->getEndingGroup() == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div id="ending_prices_field">
                @if (isset($item))
                    @include('admin.partials.endings-list', ['endings' => $item->endings()->get()])
                @endif
            </div>

        </div>
    </div>

    @include('admin.partials.photoupload', ['type' => 'products', 'item' => isset($item) ? $item : null])

    @include('admin.partials.parameters', ['item' => isset($item) ? $item : null])

    @include('admin.partials.options', ['item' => isset($item) ? $item : null])

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="filename">Import size options from Excel file:</label>
                    <div class="fancy-file-upload fancy-file-warning">
                        <i class="fa fa-upload"></i>
                        {{ Form::file('prices', ['class' => 'form-control file-upload', 'id' => 'input-file-price', 'multiple' => true]) }}
                        <input type="text" class="form-control" placeholder="no file selected" readonly="" />
                        <span class="button">Choose file</span>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="filename">&nbsp;</label>
                    <a href="#" class="btn btn-info btn-prices-{{ isset($item) ? 'upload' : 'parse' }}" data-product="{{ isset($item) ? $item->id : null }}"><i class="fa fa-upload"></i> {{ isset($item) ? 'Update' : 'Add' }} from file</a>
                </div>
            </div>
        </div>
    </div>

@endsection
