@extends('admin.layouts.main')

@section('content')

    <div class="heading-title heading-line-double">
        <h3>Scripts</h3>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Backup DB</h2>
                </div>
                <div class="panel-body" style="background-color: #fafafa;">

                    <form action="{{ url('admin/script/backup') }}" method="POST">
                        @csrf

                        <div class="row">

                            <div class="form-group col-md-6">
                                This will create a backup of the whole DB
                            </div>

                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-lg btn-primary btn-form-submit">BACKUP</button>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h2 class="panel-title">Restore DB</h2>
                </div>
                <div class="panel-body" style="background-color: #fafafa;">

                    <form action="{{ url('admin/script/restore') }}" method="POST">
                        @csrf

                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="filename">
                                    <i class="fa fa-asterisk text-danger"></i> Restore File:
                                </label>
                                <select name="filename" id="filename" class="form-control">
                                    @foreach($restores as $file)
                                        <option value="{{ $file }}">{{ $file }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-lg btn-primary btn-form-submit">
                                    RESTORE
                                </button>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h2 class="panel-title">Increase Prices</h2>
                </div>
                <div class="panel-body" style="background-color: #fafafa;">

                    <form action="{{ url('admin/script/price/increase') }}" method="POST">
                        @csrf

                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="percentage">
                                    <i class="fa fa-asterisk text-danger"></i> Percentage:
                                </label>
                                <input
                                        type="text"
                                        id="percentage"
                                        name="percentage"
                                        value="{{ old('percentage') }}"
                                        class="form-control"
                                >
                                @error('percentage')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="category_id">Category:</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="0" {{ old('category_id') == 0 ? 'selected' : '' }}>All categories</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-lg btn-primary btn-form-submit">
                                    INCREASE
                                </button>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h2 class="panel-title">Decrease Prices</h2>
                </div>
                <div class="panel-body" style="background-color: #fafafa;">

                    <form action="{{ url('admin/script/price/decrease') }}" method="POST">
                        @csrf

                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="percentage">
                                    <i class="fa fa-asterisk text-danger"></i> Percentage:
                                </label>
                                <input
                                        type="text"
                                        id="percentage"
                                        name="percentage"
                                        value="{{ old('percentage') }}"
                                        class="form-control"
                                >
                                @error('percentage')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="category_id">Category:</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="0" {{ old('category_id') == 0 ? 'selected' : '' }}>All categories</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-lg btn-primary btn-form-submit">
                                    DECREASE
                                </button>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection