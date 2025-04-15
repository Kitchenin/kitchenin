@extends('admin.layouts.main')

@section('content')

    <div id="form-collapse" class="row collapse">
        <div class="col-md-12" id="form-edit"></div>
    </div>

    <div class="heading-title heading-line-double">
        <h3>All orders</h3>
    </div>

    <div id="admin-results" data-href="{{ url('admin/orders/list') }}"></div>


@endsection