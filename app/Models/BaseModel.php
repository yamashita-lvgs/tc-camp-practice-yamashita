<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * ベースモデルクラス
 * @package App\Models
 */
abstract class BaseModel extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $guarded = [];
}
