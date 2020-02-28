<?php
namespace App\Models;

use App\Traits\BaseModelObservable;
use App\Traits\ScreenDateTimeFormat;
use Illuminate\Database\Eloquent\Model;

/**
 * ベースモデルクラス
 * @package App\Models
 */
abstract class BaseModel extends Model
{
    use  BaseModelObservable, ScreenDateTimeFormat;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
