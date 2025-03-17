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
use Modules\GeoLocation\Entities\District;
use Modules\GeoLocation\Http\Requests\V1\District\GetDistrictRequest;
use Modules\GeoLocation\Transformers\DistrictResource;

#[Group('Geo Location', 'APIs for geo location')]
#[Subgroup('Districts')]
class DistrictController extends Controller
{
    #[Endpoint('Get Districts', 'This endpoint allows you to get all district.')]
    #[Response(description: 'success', content: <<<'JSON'
    {
        "data": [
            {
                "id": 3792,
                "country_id": 55,
                "governorate_id": 24,
                "city_id": 4592,
                "name": "دوار ابن رشد"
            },
            {
                "id": 4057,
                "country_id": 55,
                "governorate_id": 24,
                "city_id": 4592,
                "name": "نوبا"
            },
            {
                "id": 4058,
                "country_id": 55,
                "governorate_id": 24,
                "city_id": 4592,
                "name": "بيت اولا"
            },
            {
                "id": 4059,
                "country_id": 55,
                "governorate_id": 24,
                "city_id": 4592,
                "name": "سعير"
            },
            {
                "id": 4060,
                "country_id": 55,
                "governorate_id": 24,
                "city_id": 4592,
                "name": "الشيوخ"
            },
            {
                "id": 4061,
                "country_id": 55,
                "governorate_id": 24,
                "city_id": 4592,
                "name": "ترقومية"
            },
            {
                "id": 4062,
                "country_id": 55,
                "governorate_id": 24,
                "city_id": 4592,
                "name": "بيت كاحل"
            },
            {
                "id": 4063,
                "country_id": 55,
                "governorate_id": 24,
                "city_id": 4592,
                "name": "بيت عنون"
            },
            {
                "id": 4064,
                "country_id": 55,
                "governorate_id": 24,
                "city_id": 4592,
                "name": "اذنا"
            },
            {
                "id": 4065,
                "country_id": 55,
                "governorate_id": 24,
                "city_id": 4592,
                "name": "تفوح"
            }
        ]
    }
    JSON)]
    #[Response(status: 422, description: 'Validation Errors', content: <<<'JSON'
    {
        "message": "القيمة المحددة لهذا الحقل غير موجودة. و 4 أخطاء أخرى",
        "errors": {
            "country_id": [
                "القيمة المحددة لهذا الحقل غير موجودة."
            ],
            "governorate_id": [
                "القيمة المحددة لهذا الحقل غير موجودة."
            ],
            "city_id": [
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
    public function index(GetDistrictRequest $request)
    {
        $countries = District::when($request->limit, function ($query, $limit) {
            $query->take($limit);
        })
            ->when($request->country_id, function ($query, $country_id) {
                $query->where('country_id', $country_id);
            })
            ->when($request->governorate_id, function ($query, $governorate_id) {
                $query->where('governorate_id', $governorate_id);
            })
            ->when($request->city_id, function ($query, $city_id) {
                $query->where('city_id', $city_id);
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

        return DistrictResource::collection($countries);
    }
}
