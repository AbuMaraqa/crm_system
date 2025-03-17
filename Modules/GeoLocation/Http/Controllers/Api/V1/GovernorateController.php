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
use Modules\GeoLocation\Entities\Governorate;
use Modules\GeoLocation\Http\Requests\V1\Governorate\GetGovernorateRequest;
use Modules\GeoLocation\Transformers\GovernorateResource;

#[Group('Geo Location', 'APIs for geo location')]
#[Subgroup('Governorates')]
class GovernorateController extends Controller
{
    #[Endpoint('Get Governorates', 'This endpoint allows you to get all governorate.')]
    #[Response(description: 'success', content: <<<'JSON'
    {
        "data": [
            {
                "id": 14,
                "country_id": 55,
                "name": "محافظة القدس"
            },
            {
                "id": 15,
                "country_id": 55,
                "name": "محافظة جنين"
            },
            {
                "id": 16,
                "country_id": 55,
                "name": "محافظة طوباس"
            },
            {
                "id": 17,
                "country_id": 55,
                "name": "محافظة طولكرم"
            },
            {
                "id": 18,
                "country_id": 55,
                "name": "محافظة نابلس"
            },
            {
                "id": 19,
                "country_id": 55,
                "name": "محافظة قلقيلية"
            },
            {
                "id": 20,
                "country_id": 55,
                "name": "محافظة سلفيت"
            },
            {
                "id": 21,
                "country_id": 55,
                "name": "محافظة رام الله والبيرة"
            },
            {
                "id": 22,
                "country_id": 55,
                "name": "محافظة اريحا"
            },
            {
                "id": 23,
                "country_id": 55,
                "name": "محافظة بيت لحم"
            }
        ]
    }
    JSON)]
    #[Response(status: 422, description: 'Validation Errors', content: <<<'JSON'
    {
        "message": "القيمة المحددة لهذا الحقل غير موجودة. و 2 أخطاء أخرى",
        "errors": {
            "country_id": [
                "القيمة المحددة لهذا الحقل غير موجودة."
            ],
            "limit": [
                "يجب على هذا الحقل أن يكون رقمًا.",
                "يجب أن تكون قيمة هذا الحقل مساوية أو أكبر من 10."
            ]
        }
    }
    JSON
    )]
    #[Response(status: 500, description: 'Server Error', content: [
        'message' => 'Server Error',
    ])]
    public function index(GetGovernorateRequest $request)
    {
        $countries = Governorate::when($request->limit, function ($query, $limit) {
            $query->take($limit);
        })
            ->when($request->country_id, function ($query, $country_id) {
                $query->where('country_id', $country_id);
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

        return GovernorateResource::collection($countries);
    }
}
