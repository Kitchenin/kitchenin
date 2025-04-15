@extends('admin.layouts.blank')

@section('mainContent')

<div id="header" class="sticky clearfix">

    <header id="topNav">
        <div class="container">

            <button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
                <i class="fa fa-bars"></i>
            </button>

            <a class="logo pull-left" href="/admin">
                ADMINISTRATION AREA
            </a>

            <div class="navbar-collapse pull-right nav-main-collapse collapse submenu-dark">
                <nav class="nav-main">

                    <ul id="topMain" class="nav nav-pills nav-main">
                        <li>
                            <a href="/admin/categories">CATEGORIES</a>
                        </li>
                        <li>
                            <a href="/admin/colours">COLOURS</a>
                        </li>
                        <li>
                            <a href="/admin/endings">ENDINGS</a>
                        </li>
                        <li>
                            <a href="/admin/groups">GROUPS</a>
                        </li>
                        <li>
                            <a href="/admin/pages">CONTENT</a>
                        </li>
                        <li>
                            <a href="/admin/articles">ARTICLES</a>
                        </li>
                        <li>
                            <a href="/admin/orders">ORDERS</a>
                        </li>
                        <li>
                            <a href="/admin/settings">SETTINGS</a>
                        </li>
                        <li>
                            <a href="/logout">LOGOUT</a>
                        </li>
                    </ul>

                </nav>
            </div>

        </div>
    </header>
    <!-- /Top Nav -->

</div>


<!-- -->
<section>
    <div class="container">

        <div class="row">

            <!-- LEFT -->
            <div class="col-lg-3 col-md-3 col-sm-3">

                <!-- CATEGORIES -->
                <div class="side-nav margin-bottom-60">

                @include('admin.partials.categories_navigation')

                </div>
                <!-- /CATEGORIES -->


            </div>

            <!-- RIGHT -->
            <div class="col-lg-9 col-md-9 col-sm-9">
                @if (Session::has('message'))
                    <div class="alert alert-info">
                        <p>{{ Session::get('message') }}</p>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ( $errors->all() as $error )
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif


                @yield('content')

            </div>




        </div>

    </div>
</section>
<!-- / -->



<!-- FOOTER -->
<footer id="footer">

    <div class="copyright">
        <div class="container">

            &copy; KitchenIN
        </div>
    </div>

</footer>

@if (isset($editId))
    <script>
        $(document).ready(function () {
            var checkExist = setInterval(function() {
                if ($('#tr_{{ $editId }}').length) {
                    $('#tr_{{ $editId }}').click();
                    clearInterval(checkExist);
                }
            }, 100); // check every 100ms

        });
    </script>
@endif

@endsection
