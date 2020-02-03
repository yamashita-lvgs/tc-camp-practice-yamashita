<?php

    namespace App\Http\Validators;

    use Illuminate\Validation\Validator;

    class RuleValidator{
        public function validateKatakana($attribute, $value, $parameters){
            if (mb_ereg('^[ア-ン゛゜ァ-ォャ-ョー「」、]+$', $value)) {
                return true;
            }
            return false;
        }
    }
