<?php

namespace App\Helpers;
use App\Photo;

class PhotoHelper
{

    public static function attach($model, $photoIds, $featured = null)
    {
        $photos = Photo::find($photoIds);
        foreach($photos as $photo) {
            $photo->update([
                'photoable_id' => $model->id,
                'featured' => $photo->id == $featured
            ]);
        }
    }

}
