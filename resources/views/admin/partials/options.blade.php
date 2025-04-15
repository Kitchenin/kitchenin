<div class="panel panel-default">
    <div class="panel-heading">
        <a class="btn btn-success btn-xs btn-panel-show pull-right">Show</a>
        <label for="options-repeatable-row">Options:</label>
    </div>
    <div class="panel-body" id="options-panel" style="display:none;">
        <div class="row">
            <div class="form-group col-md-12" id="options-holder">

                <div>
                    <a class="btn btn-primary btn-xs pull-right btn-update-order" data-target="options"><i class="fa fa-arrows-v"></i> Update order</a>
                </div>
                <div>
                    <div class="alert alert-success options-success" style="display: none;">Order updated successfully</div>
                    <div class="alert alert-danger options-danger" style="display: none;">Something went wrong. Order was not updated.</div>
                </div>

                <div id="options-list-holder" class="table-sortable" data-list="options">
                    @include('admin.partials.options-list', ['options' => isset($item) ? $item->options : []])
                </div>

                <div class="row">
                    <div class="form-group" id="options-repeatable-row">
                        <div class="col-md-6 col-xs-12">
                            {{ Form::text('options[new][name]', null, ['class' => 'form-control', 'placeholder' => 'Name']) }}
                        </div>
                        <div class="col-md-4 col-xs-3">
                            {{ Form::text('options[new][price]', null, ['class' => 'form-control', 'placeholder' => 'Price']) }}
                        </div>
                        <div class="col-md-3 col-xs-3">
                            {{ Form::text('options[new][height]', null, ['class' => 'form-control', 'placeholder' => 'Height']) }}
                        </div>
                        <div class="col-md-3 col-xs-3">
                            {{ Form::text('options[new][width]', null, ['class' => 'form-control', 'placeholder' => 'Width']) }}
                        </div>
                        <div class="col-md-3 col-xs-3">
                            {{ Form::text('options[new][depth]', null, ['class' => 'form-control', 'placeholder' => 'Depth']) }}
                        </div>

                        <div class="col-md-2 col-remove hidden">
                            <a class="btn btn-danger btn-delete-parameter"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-6" id="options-button-field">
                        <a href="#" class="btn btn-3d btn-primary btn-add-parameter" data-type="options"><i class="fa fa-plus-circle"></i></a>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>