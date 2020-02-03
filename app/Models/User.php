<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    /**
     * ユーザーテーブルのモデルクラス
     * @package App\Models
     */

    class User extends Model
    {
        protected $guarded = [];

        public function getFullName()
        {
            return "{$this->last_name} {$this->first_name}";
        }

        public function getActionedFullName()
        {
            return "{$this->actioned_user->last_name} {$this->actioned_user->first_name}";
        }

        public function gender()
        {
            return config('columnName.gender')[$this->gender_id];
        }

        public function role()
        {
            return config('columnName.role')[$this->role_id];
        }
    }


