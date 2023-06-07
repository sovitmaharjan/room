<?php

namespace App\Http\Requests\Booking;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStatusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $user = User::find(auth()->id());
        return $user->hasRole(User::ADMIN) ? [
            'status' => [
                'required',
                Rule::in([Booking::CONFIRMED, Booking::REJECTED]),
            ]
        ] : [
            'status' => [
                'required',
                Rule::in([Booking::CANCELLED]),
            ]
        ];
    }
}
