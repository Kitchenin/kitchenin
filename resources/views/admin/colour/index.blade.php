@extends('admin.layouts.main')

@section('content')

    <ul class="nav nav-tabs category-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#entities" aria-controls="entities" role="tab" data-toggle="tab"><i class="fa fa-cog"></i> Colours</a></li>
        <li role="presentation"><a href="#categories" aria-controls="categories" role="tab" data-toggle="tab"><i class="fa fa-tags"></i> Groups</a></li>
    </ul>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="entities">

            <div class="row">
                <div class="col-md-12 text-right ">
                    <a class="btn btn-primary btn-3d btn-reveal btn-form" href="/admin/colours/create"><i class="fa fa-plus-circle"></i> <span>ADD COLOUR</span></a>
                </div>
            </div>

            <div id="form-collapse" class="row collapse">
                <div class="col-md-12" id="form-edit"></div>
            </div>

            <div class="heading-title heading-line-double">
                <h3>All Colours</h3>
            </div>

            <div id="admin-results" data-href="{{ url('admin/colours/list') }}"></div>
        </div>

        <div role="tabpanel" class="tab-pane fade" id="categories">

            @include('admin.colourgroup.index')

        </div>
    </div>


@endsection