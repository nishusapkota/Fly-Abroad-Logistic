<?php

namespace App\Rules;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueJsonFieldRule implements ValidationRule
{
    protected $table;
    protected $column;

    public function __construct($table, $column)
    {
        $this->table = $table;
        $this->column = $column;
    }


    public function validate(string $attribute,$value, Closure $fail): void
    {

        if (DB::table($this->table)->where($this->column, $value)->exists()) {
            $fail("The $attribute must be unique.");
        }
    }
}
