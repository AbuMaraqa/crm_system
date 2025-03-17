<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/30/24, 10:57 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\GeoLocation\Http\Controllers\Api\V1;

use Illuminate\Routing\Controller;
use Knuckles\Scribe\Attributes\Endpoint;
use Knuckles\Scribe\Attributes\Group;
use Knuckles\Scribe\Attributes\Response;
use Knuckles\Scribe\Attributes\Subgroup;
use Modules\GeoLocation\Entities\City;
use Modules\GeoLocation\Http\Requests\V1\City\GetCityRequest;
use Modules\GeoLocation\Transformers\CityResource;

#[Group('Geo Location', 'APIs for geo location')]
#[Subgroup('Cities')]
class CityController extends Controller
{
    #[Endpoint('Get Cities', 'This endpoint allows you to get all cities.')]
    #[Response(description: 'success', content: <<<'JSON'
    {
        "data": [
            {
                "id": 4592,
                "country_id": 55,
                "governorate_id": 24,
                "name": "مدينة الخليل"
            }
        ]
    }
    JSON)]
    #[Response(status: 422, description: 'Validation Errors', content: <<<'JSON'
    {
        "message": "القيمة المحددة لهذا الحقل غير موجودة. و 3 أخطاء أخرى",
        "errors": {
            "country_id": [
                "القيمة المحددة لهذا الحقل غير موجودة."
            ],
            "governorate_id": [
                "القيمة المحددة لهذا الحقل غير موجودة."
            ],
            "limit": [
                "يجب على هذا الحقل أن يكون رقمًا.",
                "يجب أن تكون قيمة هذا الحقل مساوية أو أكبر من 10."
            ]
        }
    }
    JSON)]
    #[Response(status: 500, description: 'Server Error', content: [
        'message' => 'Server Error',
    ])]
    public function index(GetCityRequest $request)
    {
        $countries = City::when($request->limit, function ($query, $limit) {
            $query->take($limit);
        })
            ->when($request->country_id, function ($query, $country_id) {
                $query->where('country_id', $country_id);
            })
            ->when($request->governorate_id, function ($query, $governorate_id) {
                $query->where('governorate_id', $governorate_id);
            })
            ->when($request->search, function ($query, $search) {
                $query
                    ->where(function ($query) use ($search) {
                        $query
                            ->orWhere('ar_name', 'like', "%$search%")
                            ->orWhere('ar_name', 'like', "%$search%");
                    });
            })
            ->get();

        return CityResource::collection($countries);
    }
}
