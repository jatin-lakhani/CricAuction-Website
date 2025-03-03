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
            'title' => $this->title,
            // 'ipaName' => $this->ipaName,
            'numbers_of_team' => $this->number_of_teams,
            'description' => $this->description,
            'price' => $this->price,
            // 'is_default' => $this->is_default,
            'phoneNo' => $this->phoneNo,
            'paymentStatus' => $this->paymentStatus,
            'paymentDate' => $this->paymentDate,
            'paymentScreenshot' => $this->paymentScreenshot,
            'payment_id' => $this->payment_id,
        ];
    }
}
