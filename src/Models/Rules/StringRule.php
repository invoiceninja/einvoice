<?php

namespace Invoiceninja\Einvoice\Models\Rules;

use Illuminate\Contracts\Validation\Rule;

class StringRule implements Rule
{
    public function passes($attribute, $value)
    {
        foreach($value as $string)
        {
            preg_match('/[\p{L}]{1,200}/u', $string, $matches);

            if(is_string($value) && strlen($value) >= 1 && strlen($value) <= 200 && (count($matches) >= 1) === false)
                return false;
        }
        
        return true;
    }

    public function message()
    {
        return 'The :attribute must be a string with length between 1 and 200 characters.';
    }
}
