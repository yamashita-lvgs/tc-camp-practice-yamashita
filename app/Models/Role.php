<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * ロールテーブルのモデルクラス
 * @package App\Models
 */
class Role extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'operated_at',
    ];
}
