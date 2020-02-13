<?php
namespace App\Http\Validators;

use Illuminate\Validation\Validator;

/**
 * 入力ルールに関するバリデーター
 * @package App\Http\Validators
 */
class RuleValidator
{
    /**
     * 全角カタカナのバリデーション
     * @param $attribute 検査する属性名
     * @param $value 入力された値
     * @param $parameters 引数の配列
     * @return string バリデートした値
     */
    public function validateKatakana($attribute, $value, $parameters) :string
    {
        if (mb_ereg('^[ア-ン゛゜ァ-ォャ-ョー「」、]+$', $value)) {
            return true;
        }
        return false;
    }
    /**
     * 半角英数字をそれぞれ1種類以上含むバリデーション
     * @param $attribute 検査する属性名
     * @param $value 入力された値
     * @param $parameters 引数の配列
     * @return  string バリデートした値
     */
    public function validateHalfWidthCharacter($attribute, $value, $parameters) :string
    {
        if (mb_ereg('^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)(?=.*?[!-/\:-@\[-`\{-~])[a-zA-Z\d\!-/\:-@\[-`\{-~]+$', $value)) {
            return true;
        }
        return false;
    }
}


