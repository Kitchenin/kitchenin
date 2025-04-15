<div class="row">
    @foreach($photos as $photo)

        <div class="col-xs-6 col-md-3 text-center" id="photo-{{ $photo->id }}">
            <img src="{{ $photo->getFullPath() }}" class="admin-thumbnail photo-upload-thumbnail" />
            <br />
            <input type="radio" id="featured-{{ $photo->id }}" name="featuredPhotoId" {{ $photo->featured ? 'checked' : '' }} value="{{ $photo->id }}" /> <label for="featured-{{ $photo->id }}">Featured</label><br />
            <a href="#" class="btn btn-3d btn-xs btn-red photo-delete" data-id="{{ $photo->id }}" data-type="{{ $photo->getType() }}" data-itemId="{{ isset($itemId) ? $itemId : null }}"><i class="fa fa-trash"></i> Delete</a>
            <input type="hidden" name="photoIds[]" value="{{ $photo->id }}" />
        </div>

    @endforeach
</div>
