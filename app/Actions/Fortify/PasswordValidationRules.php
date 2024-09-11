<?php

namespace App\Actions\Fortify;

use Illuminate\Validation\Rules\Password;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array<int, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    protected function passwordRules(): array
    {
        // return ['required', 'string', Password::default(), 'confirmed'];
        return [
            'password' => [
                'required',
                'string',
                Password::min(8) // Minimum length
                        ->mixedCase() // Must include at least one uppercase and one lowercase letter
                        ->letters()   // Must include at least one letter
                        ->numbers()   // Must include at least one number
                        ->symbols()   // Must include at least one symbol
                        ->uncompromised(), // Ensures the password hasn’t been compromised in data leaks
            ],
        ];
    }
}
