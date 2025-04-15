<div class="panel panel-default">
    <div class="panel-heading">
        <a class="btn btn-success btn-xs btn-panel-show pull-right">Show</a>
        <label for="parameters-repeatable-row">Parameters:</label>
    </div>
    <div class="panel-body" style="display: none;">
        <div class="row">
            <div class="form-group col-md-12" id="parameters-holder">

                @if (isset($item))

                    @foreach($item->parameters()->get() as $parameter)
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-3 col-xs-6">
                                    {{ Form::text('parameters['.$parameter->id.'][name]', $parameter->name, ['class' => 'form-control']) }}
                                </div>
                                <div class="col-md-4 col-xs-6">
                                    {{ Form::text('parameters['.$parameter->id.'][value]', $parameter->value, ['class' => 'form-control']) }}
                                </div>
                                <div class="col-md-2">
                                    <a class="btn btn-danger btn-delete-parameter"><i class="fa fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                @endif

                <div class="row">
                    <div class="form-group" id="parameters-repeatable-row">
                        <div class="col-md-3 col-xs-6">
                            {{ Form::text('parameters[new][name]', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="col-md-4 col-xs-6">
                            {{ Form::text('parameters[new][value]', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="col-md-2 col-remove hidden">
                            <a class="btn btn-danger btn-delete-parameter"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6" id="parameters-button-field">
                        <a href="#" class="btn btn-3d btn-primary btn-add-parameter" data-type="parameters"><i class="fa fa-plus-circle"></i></a>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>