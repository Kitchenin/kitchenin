<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderProduct extends Pivot
{
    public function ending()
    {
        return Ending::find($this->ending_id);
    }

    public function colour()
    {
        return Colour::find($this->colour_id);
    }

    public function option()
    {
        return Option::find($this->option_id);
    }
}