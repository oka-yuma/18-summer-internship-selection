<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends BaseModel
{

    /**
     * この課が所属する部を取得
     */
    public function department()
    {
        return $this->belongsTo('App\Models\department');
    }
}
