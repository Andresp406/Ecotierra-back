<?php

namespace App\Rules;

use App\Models\Client;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Carbon;

class authorizeAge implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $client = Client::find($value);
        $age = Carbon::create($client->birth_date)->diffInYears();
        return $age > 20 && $age < 80;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El cliente debe ser mayor a 20 y menor a 80 años';
    }
}
