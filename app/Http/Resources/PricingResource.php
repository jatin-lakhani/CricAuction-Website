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
            'auction_id' => $this->auction_id,
            'name' => $this->title,
            'ipaName' => $this->ipaName,
            'team' => $this->number_of_teams,
            'description' => $this->description,
            'pricing' => $this->price,
            'is_default' => $this->is_default,
            'phoneNo' => $this->phoneNo,
            'paymentStatus' => $this->paymentStatus,
            'paymentDate' => $this->paymentDate,
            'paymentScreenshot' => $this->payment_screenshot_url,
        ];
    }
}
