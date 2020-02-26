<?php
namespace App\Models;

use App\Traits\BaseModelObservable;
use Illuminate\Database\Eloquent\Model;

/**
 * ベースモデルクラス
 * @package App\Models
 */
abstract class BaseModel extends Model
{
    use  BaseModelObservable;

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
