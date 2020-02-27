<?php
namespace App\Observers;

use App\Models\BaseModel;

/**
 * ベースモデル用のオブザーバークラス
 * @package App\Observers
 */
class BaseModelObserver
{
    /**
     * モデル登録イベント前処理
     * @param BaseModel $model 登録されたユーザーインスタンス
     */
    public function creating(BaseModel $model)
    {
        //TODO 操作ユーザー情報取得できたらこのファイルの整数値の値正しいものに
        $model->created_user_id = 1;
        $model->updated_user_id = 2;
    }

    /**
     * ユーザーモデル更新イベント前処理
     * @param BaseModel $model 更新されたユーザーインスタンス
     */
    public function updating(BaseModel $model)
    {
        //TODO 操作ユーザー情報取得できたらこのファイルの整数値の値正しいものに
        $model->updated_user_id = 3;
    }

    /**
     * ユーザーモデル削除イベント前処理
     * @param BaseModel $model 削除されたユーザーインスタンス
     */
    public function deleting(BaseModel $model)
    {
        //TODO 操作ユーザー情報取得できたらこのファイルの整数値の値正しいものに
        $model->deleted_user_id = 4;
        $model->save();
    }
}
