<?php
namespace App\Models;

use App\Traits\UserObservable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

/**
 * ユーザーテーブルのモデルクラス
 * @package App\Models
 */
class User extends BaseModel
{
    use UserObservable, SoftDeletes;

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function created_user()
    {
        return $this->belongsTo(User::class, 'created_user_id')->withTrashed();
    }

    public function updated_user()
    {
        return $this->belongsTo(User::class, 'updated_user_id')->withTrashed();
    }

    public function deleted_user()
    {
        return $this->belongsTo(User::class, 'deleted_user_id')->withTrashed();
    }

    /**
     * 性別名称のアトリビュート定義
     * @return string 性別名称
     */
    public function getGenderNameAttribute() :string
    {
        return GENDER_NAME_LIST[$this->gender_id];
    }

    /**
     * フルネームのアトリビュート定義
     * @return string フルネーム
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->last_name} {$this->first_name}";
    }

    /**
     * フルネーム（カナ）のアトリビュート定義
     * @return string フルネーム（カナ）
     */
    public function getFullNameKanaAttribute(): string
    {
        return "{$this->last_name_kana} {$this->first_name_kana}" ;
    }

    /**
     * パスワード暗号化のアトリビュート定義
     * @param string $password パスワード
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = encrypt($password);
    }

    /**
     * 論理削除されたユーザー情報を含む全ユーザー情報取得
     * @return Collection 論理削除されたユーザー情報を含む全ユーザー情報
     */
    public static function getUsersWithTrashed(): Collection
    {
        return self::withTrashed()->orderBy('id', 'asc')->get();
    }

    /**
     * 論理削除されたユーザー情報を含む指定されたIDのユーザー情報取得
     * @param int $userId ユーザーID
     * @return User 論理削除されたユーザー情報を含む指定されたIDのユーザーインスタンス
     */
    public static function getByIdWithTrashed(int $userId): User
    {
        return self::withTrashed()->findOrFail($userId);
    }

    /**
     * ユーザー認証を行う
     * @param string $loginId ログインID
     * @param string $password パスワード
     * @return bool 認証結果（true：認証OK、false：認証NG）
     */
    public static function authUser (string $loginId, string $password): bool
    {
        $findUser = self::where('login_id', $loginId)->get();
        $countFindUser = count($findUser);
        switch ($countFindUser) {
            case 0:
                return false;
            case 1:
                $user = $findUser->first();
                $userPassword = decrypt($user->password);
                return $userPassword == $password;
            default:
                Log::error("不整合データが存在します。[table:Users,login_id:{$loginId},row_count:{$countFindUser}]");
                abort(500);
        }
    }

    /**
     * ログインしたユーザーのセッション登録
     * @param string $loginId セッション登録するログインID
     * @return int $userId ログインしたユーザーのID
     */
    public static function insertLoginUserSession(string $loginId): int
    {
        return User::where('login_id', $loginId)->get()->first()->id;
    }
}
