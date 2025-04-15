@extends('admin.layouts.main')

@section('content')

    <div class="row">
        <div class="col-md-12 text-right ">
            <a class="btn btn-primary btn-3d btn-reveal btn-form" href="/admin/articles/create"><i class="fa fa-plus-circle"></i> <span>ADD ARTICLE</span></a>
        </div>
    </div>

    <div id="form-collapse" class="row collapse">
        <div class="col-md-12" id="form-edit"></div>
    </div>

    <div class="heading-title heading-line-double">
        <h3>All Articles</h3>
    </div>

    <div id="admin-results" data-href="{{ url('admin/articles/list') }}"></div>



@endsection
