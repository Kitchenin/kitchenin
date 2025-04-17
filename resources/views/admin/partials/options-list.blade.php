@foreach($options as $option)
    <div class="row row-sortable" data-id="{{ $option->id }}">
        <!-- Drag Handle -->
        <div class="col-md-1">
            <a class="drag-handle">
                <i class="fa fa-arrows"></i>
            </a>
        </div>

        <div class="col-md-11">
            <div class="row">
                <div class="form-group">
                    <!-- Option Name -->
                    <div class="col-md-8 col-xs-12">
                        <input
                                type="text"
                                name="options[{{ $option->id }}][name]"
                                value="{{ $option->name }}"
                                class="form-control"
                        />
                    </div>

                    <!-- Option Price -->
                    <div class="col-md-4 col-xs-3">
                        <input
                                type="text"
                                name="options[{{ $option->id }}][price]"
                                value="{{ $option->price }}"
                                class="form-control"
                        />
                    </div>

                    <!-- Option Height -->
                    <div class="col-md-3 col-xs-3">
                        <input
                                type="text"
                                name="options[{{ $option->id }}][height]"
                                value="{{ $option->height }}"
                                class="form-control"
                        />
                    </div>

                    <!-- Option Width -->
                    <div class="col-md-3 col-xs-3">
                        <input
                                type="text"
                                name="options[{{ $option->id }}][width]"
                                value="{{ $option->width }}"
                                class="form-control"
                        />
                    </div>

                    <!-- Option Depth -->
                    <div class="col-md-3 col-xs-3">
                        <input
                                type="text"
                                name="options[{{ $option->id }}][depth]"
                                value="{{ $option->depth }}"
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
        </div>
    </div>
@endforeach