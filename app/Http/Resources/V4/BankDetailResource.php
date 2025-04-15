<?php

namespace App\Http\Resources\V4;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BankDetailResource extends JsonResource
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
            'name' => $this->name,
            'accountNo' => $this->accountNo,
            'accountType' => $this->accountType,
            'bankName' => $this->bankName,
            'ifscCode' => $this->ifscCode,
            'upiId' => $this->upiId,
            'paypalId' => $this->paypalId,
            'whContact' => $this->whContact,
        ];
    }
}
