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

                    {{ Form::open(['url' => 'admin/script/backup']) }}

                    <div class="row">

                        <div class="form-group col-md-6">
                            This will create a backup of the whole DB
                        </div>

                        <div class="form-group col-md-6">
                            {{ Form::submit('BACKUP', ['class' => 'btn btn-lg btn-primary btn-form-submit']) }}
                        </div>

                    </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h2 class="panel-title">Restore DB</h2>
                </div>
                <div class="panel-body" style="background-color: #fafafa;">

                    {{ Form::open(['url' => 'admin/script/restore']) }}

                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="filename"><i class="fa fa-asterisk text-danger"></i> Restore File:</label>
                            <select name="filename" id="filename" class="form-control">
                                @foreach($restores as $file)
                                    <option value="{{ $file }}">{{ $file }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            {{ Form::submit('RESTORE', ['class' => 'btn btn-lg btn-primary btn-form-submit']) }}
                        </div>

                    </div>

                    {{ Form::close() }}
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

                    {{ Form::open(['url' => 'admin/script/price/increase']) }}

                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="percentage"><i class="fa fa-asterisk text-danger"></i> Percentage:</label>
                            {{ Form::text('percentage', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group col-md-6">
                            <label for="category_id">Category:</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="0">All categories</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            {{ Form::submit('INCREASE', ['class' => 'btn btn-lg btn-primary btn-form-submit']) }}
                        </div>

                    </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h2 class="panel-title">Decrease Prices</h2>
                </div>
                <div class="panel-body" style="background-color: #fafafa;">

                    {{ Form::open(['url' => 'admin/script/price/decrease']) }}

                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="percentage"><i class="fa fa-asterisk text-danger"></i> Percentage:</label>
                            {{ Form::text('percentage', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group col-md-6">
                            <label for="category_id">Category:</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="0">All categories</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            {{ Form::submit('DECREASE', ['class' => 'btn btn-lg btn-primary btn-form-submit']) }}
                        </div>

                    </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>

    </div>

@endsection