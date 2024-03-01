<?php

namespace App\Http\Requests;

use App\Enums\PlayerPosition;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class StorePlayerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'position' => ['required', new Enum(PlayerPosition::class)]
            // 'position' => Rule::enum(PlayerPosition::class),
        ];
    }

    /**
     * Show response when the validation failed
     */

    public function response(array $errors)
    {
        return new JsonResponse([
            'status' => '422',
            'errors' => $errors,
        ], 422);
    }
}
