<div class="panel panel-{{ isset($item) ? 'warning' : 'success' }}">
    <!-- Panel Header -->
    <div class="panel-heading">
        <a
                class="btn btn-warning btn-xs btn-form-cancel pull-right"
                data-type="category"
        >
            Hide
        </a>
        <h2 class="panel-title">{{ $formTitle }}</h2>
    </div>

    <!-- Panel Body -->
    <div class="panel-body" style="background-color: #fafafa;">

        <div id="category-form-status"></div>

        <!-- Form -->
        <form
                action="{{ $formUrl }}"
                method="POST"
                id="categoryAjaxForm"
                class="{{ isset($item) ? 'edit-form' : 'create-form' }}"
        >
            @csrf <!-- Include CSRF token -->

            <div class="row">
                <!-- Name Field -->
                <div class="form-group col-md-4">
                    <label for="name">
                        <i class="fa fa-asterisk text-danger"></i> Name:
                    </label>
                    <input
                            type="text"
                            name="name"
                            id="name"
                            value="{{ isset($item) ? $item->name : '' }}"
                            class="form-control"
                            required
                    />
                </div>
            </div>

            <div class="row">
                <!-- Submit and Cancel Buttons -->
                <div class="form-group col-md-12">
                    <button
                            type="submit"
                            class="btn btn-lg btn-primary btn-form-submit"
                    >
                        {{ isset($item) ? 'Update' : 'Add' }}
                    </button>
                    <a
                            href="#"
                            class="btn btn-lg btn-warning btn-form-cancel"
                            data-type="category"
                    >
                        Cancel
                    </a>
                </div>
            </div>

        </form>
    </div>
</div>