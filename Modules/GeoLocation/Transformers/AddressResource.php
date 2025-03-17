<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/30/24, 10:57 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\GeoLocation\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\GeoLocation\Entities\District;

class AddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        if ($this->resource instanceof District) {
            return [
                'country' => $this->whenLoaded('country', $this->country?->getCommonName(), null),
                'governorate' => $this->whenLoaded('governorate', $this->governorate?->getName(), null),
                'city' => $this->whenLoaded('city', $this->city?->getName(), null),
                'district' => $this->getName(),
            ];
        }

        return [
            'country' => null,
            'governorate' => null,
            'city' => null,
            'district' => null,
        ];
    }
}
