<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * ロールテーブルのモデルクラス
 * @package App\Models
 */
class Role extends Model
{
    /**
     *日時に関するカラムの定義
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'operated_at',
    ];
}
