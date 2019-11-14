<?php

namespace Modules\Order\Rules;

use Illuminate\Contracts\Validation\Rule;

class Multiple implements Rule
{

    private $multiple;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($multiple)
    {
        $this->multiple = $multiple;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return ($value%$this->multiple == 0);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
