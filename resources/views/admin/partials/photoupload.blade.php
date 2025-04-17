<div class="panel panel-default">
    <div class="panel-body">
        <div id="photo-results" style="margin-bottom: 10px;">
            @if (!empty($item))
                @include('admin.partials.photolist', ['itemId' => $item->id, 'photos' => $item->photos()->get()])
            @endif
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="photos">Images:</label>
                <div class="fancy-file-upload fancy-file-warning">
                    <i class="fa fa-upload"></i>
                    <input type="file" name="photos[]" class="form-control file-upload" id="input-file" multiple>
                    <input type="text" class="form-control" placeholder="no file selected" readonly />
                    <span class="button">Choose files</span>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="filename">&nbsp;</label>
                <a href="#" class="btn btn-info btn-photo-upload" data-type="{{ $type }}"><i class="fa fa-upload"></i> Upload</a>
            </div>
        </div>
    </div>
</div>