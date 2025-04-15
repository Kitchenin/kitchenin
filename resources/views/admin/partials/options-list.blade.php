@foreach($options as $option)
    <div class="row row-sortable" data-id="{{ $option->id }}">
        <div class="col-md-1">
            <a class="drag-handle"><i class="fa fa-arrows"></i></a>
        </div>
        <div class="col-md-11">
            <div class="row">
                <div class="form-group">
                    <div class="col-md-8 col-xs-12">
                        {{ Form::text('options['.$option->id.'][name]', $option->name, ['class' => 'form-control']) }}
                    </div>
                    <div class="col-md-4 col-xs-3">
                        {{ Form::text('options['.$option->id.'][price]', $option->price, ['class' => 'form-control']) }}
                    </div>
                    <div class="col-md-3 col-xs-3">
                        {{ Form::text('options['.$option->id.'][height]', $option->height, ['class' => 'form-control']) }}
                    </div>
                    <div class="col-md-3 col-xs-3">
                        {{ Form::text('options['.$option->id.'][width]', $option->width, ['class' => 'form-control']) }}
                    </div>
                    <div class="col-md-3 col-xs-3">
                        {{ Form::text('options['.$option->id.'][depth]', $option->depth, ['class' => 'form-control']) }}
                    </div>

                    <div class="col-md-2">
                        <a class="btn btn-danger btn-delete-parameter"><i class="fa fa-trash"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach