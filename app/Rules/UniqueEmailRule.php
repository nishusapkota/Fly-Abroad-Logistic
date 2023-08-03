<?php

namespace App\Rules;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueEmailRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

     private $contactId;

    public function __construct($contactId)
    {
        $this->contactId = $contactId;
    }

    public function passes(string $attribute, mixed $value, Closure $fail)
    {
        $existingEmails = DB::table('contacts')
            ->where('id', '<>', $this->contactId)
            ->pluck('email')
            ->toArray();

        foreach ($value as $email) {
            if (in_array($email, $existingEmails)) {
                return false; // Validation fails if there is a duplicate email.
            }
        }
        return true; // Validation passes if all emails are unique.
    }

    public function message()
    {
        return 'One or more email addresses are not unique.';
    }
   
}
