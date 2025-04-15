<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Photo;
use App\Helpers\PhotoUploader;

class PhotoController extends Controller
{

    public function index(Request $request)
    {
        $data = $request->all();
        $photos = Photo::where('photoable_type', Photo::getPhotoableTypeByType($data['type']))
            ->where(function($query) use ($data) {
                $query->where('photoable_id', null)
                    ->orWhere('photoable_id', $data['id']);
            })
            ->get();

        return view('admin.partials.photolist', [
            'photos' => $photos,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $files = PhotoUploader::saveMultiple($request->file('photos'), $data['type']);
        foreach ($files as $file) {
            $image = Photo::create([
                'photoable_type' => Photo::getPhotoableTypeByType($data['type']),
                'filename' => $file
            ]);
        }

        return response()->json(['type' => $data['type'], 'id' => null]);
    }

    public function destroy(Photo $photo)
    {
        unlink('.'.$photo->getFullPath());
        $photo->delete();
        return response()->json(['message' => ['Image was deleted!']]);
    }
}
