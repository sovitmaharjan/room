<?php

namespace App\Http\Requests\Room;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'room_type_id' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif',
            'price' => 'required|numeric',
            'description' => 'required',
            'availability' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'room_type_id.required' => 'The room type field is required.'
        ];
    }
}
