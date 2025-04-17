<div class="panel panel-default">
    <!-- Panel Header -->
    <div class="panel-heading">
        <a class="btn btn-success btn-xs btn-panel-show pull-right">Show</a>
        <label for="parameters-repeatable-row">Parameters:</label>
    </div>

    <!-- Panel Body -->
    <div class="panel-body" style="display: none;">
        <div class="row">
            <div class="form-group col-md-12" id="parameters-holder">

                <!-- Existing Parameters -->
                @if (isset($item))
                    @foreach($item->parameters()->get() as $parameter)
                        <div class="row">
                            <div class="form-group">
                                <!-- Name Field -->
                                <div class="col-md-3 col-xs-6">
                                    <input
                                            type="text"
                                            name="parameters[{{ $parameter->id }}][name]"
                                            value="{{ $parameter->name }}"
                                            class="form-control"
                                    />
                                </div>
                                <!-- Value Field -->
                                <div class="col-md-4 col-xs-6">
                                    <input
                                            type="text"
                                            name="parameters[{{ $parameter->id }}][value]"
                                            value="{{ $parameter->value }}"
                                            class="form-control"
                                    />
                                </div>
                                <!-- Delete Button -->
                                <div class="col-md-2">
                                    <a class="btn btn-danger btn-delete-parameter">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

                <!-- Repeatable New Parameter Row -->
                <div class="row">
                    <div class="form-group" id="parameters-repeatable-row">
                        <!-- New Parameter Name Field -->
                        <div class="col-md-3 col-xs-6">
                            <input
                                    type="text"
                                    name="parameters[new][name]"
                                    value=""
                                    class="form-control"
                            />
                        </div>
                        <!-- New Parameter Value Field -->
                        <div class="col-md-4 col-xs-6">
                            <input
                                    type="text"
                                    name="parameters[new][value]"
                                    value=""
                                    class="form-control"
                            />
                        </div>
                        <!-- Delete Button (Hidden for New Parameters) -->
                        <div class="col-md-2 col-remove hidden">
                            <a class="btn btn-danger btn-delete-parameter">
                                <i class="fa fa-trash"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Add Button -->
                    <div class="col-md-4 col-xs-6" id="parameters-button-field">
                        <a
                                href="#"
                                class="btn btn-3d btn-primary btn-add-parameter"
                                data-type="parameters"
                        >
                            <i class="fa fa-plus-circle"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>