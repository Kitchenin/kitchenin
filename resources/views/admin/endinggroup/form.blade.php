<div class="panel panel-{{ isset($item) ? 'warning' : 'success' }}">
    <div class="panel-heading">
        <a class="btn btn-warning btn-xs btn-form-cancel pull-right" data-type="category">Hide</a>
        <h2 class="panel-title">{{ $formTitle }}</h2>
    </div>
    <div class="panel-body" style="background-color: #fafafa;">

        <div id="category-form-status"></div>

        {{ Form::open(['url' => $formUrl,  'id' => 'categoryAjaxForm', 'class' => isset($item) ? 'edit-form' : 'create-form']) }}

        <div class="row">

            <div class="form-group col-md-4">
                <label for="name"><i class="fa fa-asterisk text-danger"></i> Name:</label>
                {{ Form::text('name', isset($item) ? $item->name : null, ['class' => 'form-control']) }}
            </div>

        </div>

        <div class="row">
            <div class="form-group col-md-12">
                {{ Form::submit(isset($item) ? 'Update' : 'Add', ['class' => 'btn btn-lg btn-primary btn-form-submit']) }}
                <a href="#" class="btn btn-lg btn-warning btn-form-cancel" data-type="category">Cancel</a>
            </div>
        </div>

        {{ Form::close() }}
    </div>
</div>