<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    static function getSelectList()
    {
        return self::getNameList(self::all());
    }

    static function getNameList($allArray)
    {
        $nameList = [0 => '選択してください'];
        foreach ($allArray as $id => $value) {
            $nameList[$value->id] = $value->name;
        }

        return $nameList;
    }
}
