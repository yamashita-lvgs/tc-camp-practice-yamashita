<?php
namespace App\Observers;

use App\Models\BaseModel;
use App\Models\User;

//TODO 操作ユーザー情報取得できたらこのファイル削除
/**
 * ユーザーモデル用のオブザーバークラス
 * @package App\Observers
 */
class BaseModelObserver
{
    /**
     * ユーザーモデル登録イベント前処理
     * @param BaseModel $model 登録されたユーザーインスタンス
     */
    public function creating(BaseModel $model)
    {
        $model->created_user_id = 999;
        $model->updated_user_id = 2;
    }

    /**
     * ユーザーモデル更新イベント前処理
     * @param BaseModel $model 更新されたユーザーインスタンス
     */
    public function updating(BaseModel $model)
    {
        $model->updated_user_id = 3;
    }

    /**
     * ユーザーモデル削除イベント前処理
     * @param BaseModel 削除されたユーザーインスタンス
     */
    public function deleting(BaseModel $model)
    {
        $model = User::where('id', $model->id)->first();
        $model->deleted_user_id = 4;
        $model->save();
    }
}
