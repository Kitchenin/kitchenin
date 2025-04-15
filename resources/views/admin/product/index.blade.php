@extends('admin.layouts.main')

@section('content')

    <div class="row">
        <div class="col-md-12 text-right ">
            <a class="btn btn-primary btn-3d btn-reveal btn-form" href="/admin/categories/{{ $productCategory->id }}/products/create"><i class="fa fa-plus-circle"></i> <span>ADD PRODUCT</span></a>
        </div>
    </div>

    <div id="form-collapse" class="row collapse">
        <div class="col-md-12" id="form-edit"></div>
    </div>

    <div class="heading-title heading-line-double">
        <h3>Products from {{ $productCategory->name }}</h3>
    </div>

    <div id="admin-results" data-href="{{ url('admin/categories/'.$productCategory->id.'/products/list') }}"></div>



@endsection