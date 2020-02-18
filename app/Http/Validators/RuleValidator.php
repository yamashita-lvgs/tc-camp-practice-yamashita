<?php
namespace App\Http\Validators;

use Illuminate\Support\Collection;
use Illuminate\Validation\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

/**
 * 入力ルールに関するバリデーター
 * @package App\Http\Validators
 */
class RuleValidator
{
    /**
     * 全角カタカナのバリデーション
     * @param $attribute 検査する属性名
     * @param $value string 入力された値
     * @return bool 全て全角カタカナ（true：検証OK、false：検証NG）
     */
    public function validateKatakana(string $attribute, string $value): bool
    {
        return mb_ereg('^[ア-ン゛゜ァ-ォャ-ョー「」、]+$', $value);
    }

    /**
     * 半角英数字をそれぞれ1種類以上含むバリデーション
     * @param $attribute 検査する属性名
     * @param $value 入力された値
     * @return string バリデートした値
     * @return bool 半角英数字をそれぞれ1種類以上含む値 （true：検証OK、false：検証NG）
     */
    public function validateEachIncludingHalfWidthCharacter(string $attribute, string $value): bool
    {
        return mb_ereg('^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)(?=.*?[!-/\:-@\[-`\{-~])[a-zA-Z\d\!-/\:-@\[-`\{-~]+$', $value);
    }
}
