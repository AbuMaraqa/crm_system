<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/30/24, 10:57 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\GeoLocation\Http\Requests\V1\Governorate;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Knuckles\Scribe\Attributes\QueryParam;
use Modules\GeoLocation\Entities\Country;

/**
 * Query parameters
 */
#[QueryParam('country_id', 'integer', example: 2)]
#[QueryParam('search', 'string', example: 'الضفة الغربية')]
#[QueryParam('limit', 'integer', example: 15)]
class GetGovernorateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'country_id' => ['nullable', Rule::exists(Country::class, 'id')],
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
