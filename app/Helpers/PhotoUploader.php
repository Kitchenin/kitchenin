<?php

namespace App\Helpers;

class PhotoUploader
{

    public static function saveMultiple($files, $dir)
    {
    	$fileNames = array();
    	foreach ($files as $file)
    	{
    		if ($file->isValid()) {
	    		$fileNames[] = self::saveOne($file, $dir);
	    	}
    	}
    	return $fileNames;
    }

    public static function saveOne($file, $dir)
    {
    	$fileName = str_random(5) . '-' . $file->getClientOriginalName();
		$file->move('./images/'.$dir.'/', $fileName);
		return $fileName;
    }
}
