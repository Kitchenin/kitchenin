<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopModel extends Model
{
    const noImageStatic = '/images/noimage.png';

    public function getDate()
    {
        return \Carbon\Carbon::parse($this->created_at)->format('d/m/Y');
    }

    public function getFirstPhoto()
    {
        if (!method_exists($this, 'photos') || !$this->photos()->first()) {
            return self::noImageStatic;
        }

        return $this->photos()->first()->getFullPath();
    }

}
