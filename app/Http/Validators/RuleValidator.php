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
     * @return バリデートした値
     */
    public function validateKatakana($attribute, $value, $parameters)
    {
        if (mb_ereg('^[ア-ン゛゜ァ-ォャ-ョー「」、]+$', $value)) {
            return true;
        }
        return false;
    }
    /**
     * 半角英数字をそれぞれ1種類以上含むバリデーション
     * @return バリデートした値
     */
    public function validateHalfWidthAlphaNumeric($attribute, $value, $parameters)
    {
        if (mb_ereg('^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)(?=.*?[!-/\:-@\[-`\{-~])[a-zA-Z\d\!-/\:-@\[-`\{-~]+$', $value)) {
            return true;
        }
        return false;
    }
}


