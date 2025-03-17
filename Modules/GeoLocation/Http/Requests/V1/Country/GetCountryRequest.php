<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/30/24, 10:57 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\GeoLocation\Http\Requests\V1\Country;

use Illuminate\Foundation\Http\FormRequest;
use Knuckles\Scribe\Attributes\QueryParam;

/**
 * Query parameters
 */
#[QueryParam('search', 'string', example: 'فلسطين')]
#[QueryParam('limit', 'integer', example: 15)]
class GetCountryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'search' => ['nullable', 'string'],
            'limit' => ['nullable', 'numeric', 'min:10'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
