<div class="panel panel-{{ isset($item) ? 'warning' : 'success' }}">
    <div class="panel-heading">
        <a class="btn btn-warning btn-xs btn-form-cancel pull-right">Hide</a>
        <h2 class="panel-title">{{ $formTitle }}</h2>
    </div>
    <div class="panel-body" style="background-color: #fafafa;">

        <div id="form-status"></div>

        {{ Form::open(['url' => $formUrl, 'files' => true, 'id' => 'adminAjaxForm', 'class' => isset($item) ? 'edit-form' : 'create-form']) }}

        @yield('content')

        @section('form-buttons')
        <div class="row">
            <div class="form-group col-md-12">
                {{ Form::submit(isset($item) ? 'Update' : 'Add', ['class' => 'btn btn-lg btn-primary btn-form-submit']) }}
                <a href="#" class="btn btn-lg btn-warning btn-form-cancel">Cancel</a>
            </div>
        </div>
        @show

        {{ Form::close() }}
    </div>
</div>