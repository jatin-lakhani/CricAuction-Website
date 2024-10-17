<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PricingResource extends JsonResource
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
            'title' => $this->title,
            'ipaName' => $this->ipaName,
            'number_of_teams' => $this->number_of_teams,
            'description' => $this->description,
            'price' => $this->price,
            'is_default' => $this->is_default,
        ];
    }
}
