@extends('admin.partials.form')

@section('content')

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">

                <!-- Name Input -->
                <div class="form-group col-md-4">
                    <label for="name"><i class="fa fa-asterisk text-danger"></i> Name:</label>
                    <input
                            type="text"
                            name="name"
                            id="name"
                            value="{{ isset($item) ? $item->name : old('name') }}"
                            class="form-control"
                    >
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Category Dropdown -->
                <div class="form-group col-md-4">
                    <label for="product-category">Category:</label>
                    <select
                            name="category_id"
                            class="form-control"
                            id="product-category"
                            data-id="{{ isset($item) ? $item->id : 0 }}"
                    >
                        <option value=""></option>
                        @foreach($categories as $parentCategory)
                            <option
                                    value="{{ $parentCategory->id }}"
                                    {{
                                        (isset($item) && $item->category_id == $parentCategory->id) ||
                                        (!isset($item) && $category->id == $parentCategory->id) ? 'selected' : ''
                                    }}
                            >
                                --- {{ $parentCategory->name }} ---
                            </option>
                            @foreach($parentCategory->children()->get() as $childCategory)
                                <option
                                        value="{{ $childCategory->id }}"
                                        {{
                                            (isset($item) && $item->category_id == $childCategory->id) ||
                                            (!isset($item) && $category->id == $childCategory->id) ? 'selected' : ''
                                        }}
                                >
                                    {{ $childCategory->name }}
                                </option>
                            @endforeach
                        @endforeach
                    </select>
                    @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Group Dropdown -->
                <div class="form-group col-md-4">
                    <label for="group_id">Group:</label>
                    <select
                            name="group_id"
                            id="group_id"
                            class="form-control"
                    >
                        <option value=""></option>
                        @foreach($groups as $group)
                            <option
                                    value="{{ $group->id }}"
                                    {{ isset($item) && $item->group_id == $group->id ? 'selected' : '' }}
                            >
                                {{ $group->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('group_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="row">

                <!-- Slug Input -->
                <div class="form-group col-md-4">
                    <label for="slug">Slug (in the URL):</label>
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

                <!-- SKU Input -->
                <div class="form-group col-md-4">
                    <label for="sku">SKU:</label>
                    <input
                            type="text"
                            name="sku"
                            id="sku"
                            value="{{ isset($item) ? $item->sku : old('sku') }}"
                            class="form-control"
                    >
                    @error('sku')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="row">

                <!-- Price Input -->
                <div class="form-group col-md-4">
                    <label for="price"><i class="fa fa-asterisk text-danger"></i> Price:</label>
                    <input
                            type="text"
                            name="price"
                            id="price"
                            value="{{ isset($item) ? $item->price : old('price') }}"
                            class="form-control"
                    >
                    @error('price')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Sample Door Price Input -->
                <div class="form-group col-md-4">
                    <label for="sample_price">Sample Door Price:</label>
                    <input
                            type="text"
                            name="sample_price"
                            id="sample_price"
                            value="{{ isset($item) ? $item->sample_price : old('sample_price') }}"
                            class="form-control"
                    >
                    @error('sample_price')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
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

                <!-- Delivery Input -->
                <div class="form-group col-md-4">
                    <label for="delivery">Delivery:</label>
                    <input
                            type="text"
                            name="delivery"
                            id="delivery"
                            value="{{ isset($item) ? $item->delivery : old('delivery') }}"
                            class="form-control"
                    >
                    @error('delivery')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Dispatch Input -->
                <div class="form-group col-md-4">
                    <label for="dispatch">Dispatch:</label>
                    <input
                            type="text"
                            name="dispatch"
                            id="dispatch"
                            value="{{ isset($item) ? $item->dispatch : old('dispatch') }}"
                            class="form-control"
                    >
                    @error('dispatch')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Out of Stock Checkbox -->
                <div class="form-group col-md-4">
                    <label for="out_of_stock">Out of stock:</label>
                    <input
                            type="checkbox"
                            name="out_of_stock"
                            id="out_of_stock"
                            value="1"
                            {{ isset($item) && $item->out_of_stock ? 'checked' : '' }}
                    >
                </div>

            </div>

            <div class="row">

                <!-- Rating Input -->
                <div class="form-group col-md-4">
                    <label for="rating">Rating:</label>
                    <input
                            type="text"
                            name="rating"
                            id="rating"
                            value="{{ isset($item) ? $item->rating : old('rating') }}"
                            class="form-control"
                    >
                    @error('rating')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Ratings Count Input -->
                <div class="form-group col-md-4">
                    <label for="ratings_count">Ratings count:</label>
                    <input
                            type="text"
                            name="ratings_count"
                            id="ratings_count"
                            value="{{ isset($item) ? $item->ratings_count : old('ratings_count') }}"
                            class="form-control"
                    >
                    @error('ratings_count')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="row">

                <!-- Page Title Input -->
                <div class="form-group col-md-12">
                    <label for="page_title">Page Title:</label>
                    <input
                            type="text"
                            name="page_title"
                            id="page_title"
                            value="{{ isset($item) ? $item->page_title : old('page_title') }}"
                            class="form-control"
                    >
                    @error('page_title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="row">

                <!-- Meta Description Input -->
                <div class="form-group col-md-12">
                    <label for="meta_description">Meta Description:</label>
                    <input
                            type="text"
                            name="meta_description"
                            id="meta_description"
                            value="{{ isset($item) ? $item->meta_description : old('meta_description') }}"
                            class="form-control"
                    >
                    @error('meta_description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>

        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">

                <!-- Description Textarea -->
                <div class="form-group col-md-12">
                    <label for="description">Description:</label>
                    <textarea
                            name="description"
                            id="description"
                            class="form-control ckeditor"
                            rows="8"
                    >{{ isset($item) ? $item->description : old('description') }}</textarea>
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">

                <!-- Colour Group Select -->
                <div class="form-group col-md-4">
                    <label for="colour_group_id">Colour Group:</label>
                    <select
                            name="colour_group_id"
                            id="colour_group_id_select"
                            class="form-control"
                    >
                        <option value=""></option>
                        @foreach($colourGroups as $group)
                            <option
                                    value="{{ $group->id }}"
                                    {{ isset($item) && $item->getColourGroup() == $group->id ? 'selected' : '' }}
                            >
                                {{ $group->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('colour_group_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <!-- Colour Prices Field -->
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

                <!-- Ending Group Select -->
                <div class="form-group col-md-4">
                    <label for="ending_group_id">Ending Group:</label>
                    <select
                            name="ending_group_id"
                            id="ending_group_id_select"
                            class="form-control"
                    >
                        <option value=""></option>
                        @foreach($endingGroups as $group)
                            <option
                                    value="{{ $group->id }}"
                                    {{ isset($item) && $item->getEndingGroup() == $group->id ? 'selected' : '' }}
                            >
                                {{ $group->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('ending_group_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <!-- Ending Prices Field -->
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

                <!-- File Upload Section -->
                <div class="form-group col-md-6">
                    <label for="prices">Import Size Options from Excel File:</label>
                    <div class="fancy-file-upload fancy-file-warning">
                        <i class="fa fa-upload"></i>
                        <input
                                type="file"
                                name="prices"
                                id="input-file-price"
                                class="form-control file-upload"
                                multiple
                        />
                        <input
                                type="text"
                                class="form-control"
                                placeholder="no file selected"
                                readonly
                        />
                        <span class="button">Choose file</span>
                    </div>
                </div>

                <!-- Add or Update Button -->
                <div class="form-group col-md-6">
                    <label for="">&nbsp;</label>
                    <a
                            href="#"
                            class="btn btn-info btn-prices-{{ isset($item) ? 'upload' : 'parse' }}"
                            data-product="{{ isset($item) ? $item->id : null }}"
                    >
                        <i class="fa fa-upload"></i>
                        {{ isset($item) ? 'Update' : 'Add' }} from file
                    </a>
                </div>

            </div>
        </div>
    </div>

@endsection
