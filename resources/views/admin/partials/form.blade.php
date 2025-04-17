<div class="panel panel-{{ isset($item) ? 'warning' : 'success' }}">
    <div class="panel-heading">
        <a class="btn btn-warning btn-xs btn-form-cancel pull-right">Hide</a>
        <h2 class="panel-title">{{ $formTitle }}</h2>
    </div>
    <div class="panel-body" style="background-color: #fafafa;">

        <div id="form-status"></div>

        {{-- Open the form with regular HTML --}}
        <form action="{{ $formUrl }}" method="POST" enctype="multipart/form-data" id="adminAjaxForm" class="{{ isset($item) ? 'edit-form' : 'create-form' }}">
            @csrf

            {{-- Include PUT request method if updating --}}
            @if (isset($item))
                @method('PUT')
            @endif

            {{-- Dynamic content slot --}}
            @yield('content')

            {{-- Dynamic form buttons --}}
            @section('form-buttons')
                <div class="row">
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-lg btn-primary btn-form-submit">
                            {{ isset($item) ? 'Update' : 'Add' }}
                        </button>
                        <a href="#" class="btn btn-lg btn-warning btn-form-cancel">Cancel</a>
                    </div>
                </div>
            @show
        </form>
        {{-- Close form --}}
    </div>
</div>