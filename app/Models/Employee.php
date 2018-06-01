<?php

namespace App\Models;

use Carbon\Carbon;

/**
 * @property mixed birthday
 * @property mixed hire_date
 */
class Employee extends BaseModel
{
    /**
     * 日付を変形する属性
     *
     * @var array
     */
    protected $dates = [
        'birthday',
        'hire_date',
        'created_at',
        'updated_at'
    ];

    /**
     * この従業員が所属する課を取得
     */
    public function division()
    {
        return $this->belongsTo('App\Models\Division');
    }

    /**
     * この従業員が所属する役職を取得
     */
    public function position()
    {
        return $this->belongsTo('App\Models\Position');
    }

    /**
     * この従業員の誕生日を年月日で取得
     *
     */
    public function getBirthdayJpAttribute()
    {
        // Carbon というクラスがありますので、下記URLを参考にしてください
        // http://carbon.nesbot.com/docs/#api-formatting
        // 他の日本語記事を検索してもいいと思います。
        $dateCarbon = new Carbon($this->birthday);
        $dateCarbon = $dateCarbon->format('Y年m月d日');
        return $dateCarbon;
    }

    /**
     * この従業員の入社日を年月日で取得
     *
     */
    public function getHireDateJpAttribute()
    {
        // Carbon というクラスがありますので、下記URLを参考にしてください
        // http://carbon.nesbot.com/docs/#api-formatting
        // 他の日本語記事を検索してもいいと思います。

        $dateCarbon = new Carbon($this->hire_date);
        $dateCarbon = $dateCarbon->format('Y年m月d日');
        return $dateCarbon;
    }

    /**
     * この従業員の入社日を年月日で取得
     *
     */
    public function getAgeAttribute()
    {
        $dateCarbon = new Carbon($this->birthday);
        return $dateCarbon->diffInYears();
    }
}
