<div class="panel panel-default">
    <!-- Panel Header -->
    <div class="panel-heading">
        <a class="btn btn-success btn-xs btn-panel-show pull-right">Show</a>
        <label for="options-repeatable-row">Options:</label>
    </div>

    <!-- Panel Body -->
    <div class="panel-body" id="options-panel" style="display:none;">
        <div class="row">
            <div class="form-group col-md-12" id="options-holder">

                <!-- Update Order Button -->
                <div>
                    <a
                            class="btn btn-primary btn-xs pull-right btn-update-order"
                            data-target="options"
                    >
                        <i class="fa fa-arrows-v"></i> Update order
                    </a>
                </div>

                <!-- Success and Error Notifications -->
                <div>
                    <div class="alert alert-success options-success" style="display: none;">
                        Order updated successfully
                    </div>
                    <div class="alert alert-danger options-danger" style="display: none;">
                        Something went wrong. Order was not updated.
                    </div>
                </div>

                <!-- Options List -->
                <div id="options-list-holder" class="table-sortable" data-list="options">
                    @include('admin.partials.options-list', ['options' => isset($item) ? $item->options : []])
                </div>

                <!-- Repeatable New Option Row -->
                <div class="row">
                    <div class="form-group" id="options-repeatable-row">
                        <!-- Option Name -->
                        <div class="col-md-6 col-xs-12">
                            <input
                                    type="text"
                                    name="options[new][name]"
                                    class="form-control"
                                    placeholder="Name"
                                    value=""
                            />
                        </div>
                        <!-- Option Price -->
                        <div class="col-md-4 col-xs-3">
                            <input
                                    type="text"
                                    name="options[new][price]"
                                    class="form-control"
                                    placeholder="Price"
                                    value=""
                            />
                        </div>
                        <!-- Option Height -->
                        <div class="col-md-3 col-xs-3">
                            <input
                                    type="text"
                                    name="options[new][height]"
                                    class="form-control"
                                    placeholder="Height"
                                    value=""
                            />
                        </div>
                        <!-- Option Width -->
                        <div class="col-md-3 col-xs-3">
                            <input
                                    type="text"
                                    name="options[new][width]"
                                    class="form-control"
                                    placeholder="Width"
                                    value=""
                            />
                        </div>
                        <!-- Option Depth -->
                        <div class="col-md-3 col-xs-3">
                            <input
                                    type="text"
                                    name="options[new][depth]"
                                    class="form-control"
                                    placeholder="Depth"
                                    value=""
                            />
                        </div>

                        <!-- Delete Button for New Options -->
                        <div class="col-md-2 col-remove hidden">
                            <a class="btn btn-danger btn-delete-parameter">
                                <i class="fa fa-trash"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Add New Option Button -->
                    <div class="col-md-2 col-xs-6" id="options-button-field">
                        <a
                                href="#"
                                class="btn btn-3d btn-primary btn-add-parameter"
                                data-type="options"
                        >
                            <i class="fa fa-plus-circle"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>