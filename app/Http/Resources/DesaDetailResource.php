<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DesaDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'district_code' => $this->district_code,
            'name' => $this->name,
            'meta' => $this->meta,
            'district' => $this->whenLoaded('district'),
            'cities' => $this->whenLoaded('district.cities'),
        ];
    }
}
