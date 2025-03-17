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
use Modules\GeoLocation\Entities\Country;
use Modules\GeoLocation\Http\Requests\V1\Country\GetCountryRequest;
use Modules\GeoLocation\Transformers\CountryResource;

#[Group('Geo Location', 'APIs for geo location')]
#[Subgroup('Countries')]
class CountryController extends Controller
{
    #[Endpoint('Get Countries', 'This endpoint allows you to get all countries.')]
    #[Response(description: 'success', content: <<<'JSON'
    {
        "data": [
            {
                "id": 1,
                "en_common_name": "Finland",
                "en_official_name": "Republic of Finland",
                "ar_common_name": "فنلندا",
                "ar_official_name": "جمهورية فنلندا",
                "native_common_name": "Suomi",
                "native_official_name": "Suomen tasavalta"
            },
            {
                "id": 2,
                "en_common_name": "Guatemala",
                "en_official_name": "Republic of Guatemala",
                "ar_common_name": "غواتيمالا",
                "ar_official_name": "جمهورية غواتيمالا",
                "native_common_name": "Guatemala",
                "native_official_name": "República de Guatemala"
            }
            //...
        ]
    }
    JSON)]
    #[Response(status: 500, description: 'Server Error', content: [
        'message' => 'Server Error',
    ])]
    public function index(GetCountryRequest $request)
    {
        $countries = Country::when($request->limit, function ($query, $limit) {
            $query->take($limit);
        })
            ->when($request->search, function ($query, $search) {
                $query
                    ->orWhere('en_common_name', 'like', "%$search%")
                    ->orWhere('en_official_name', 'like', "%$search%")
                    ->orWhere('ar_common_name', 'like', "%$search%")
                    ->orWhere('ar_official_name', 'like', "%$search%")
                    ->orWhere('native_common_name', 'like', "%$search%")
                    ->orWhere('native_official_name', 'like', "%$search%");
            })
            ->get();

        return CountryResource::collection($countries);
    }
}
