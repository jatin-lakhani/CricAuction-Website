<?php

namespace App\Http\Resources\V4;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuctionResource extends JsonResource
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
            'auction_name' => $this->auction_name,
            'auction_date' => Carbon::parse($this->auction_date)->format('d-m-Y'),
            'auction_time' => Carbon::parse($this->auction_time)->format('h:i A'),
            'points_par_team' => $this->points_par_team,
            'min_bid' => $this->min_bid,
            'bid_increase_by' => $this->bid_increase_by,
            'player_per_team' => $this->player_per_team,
            'venue' => $this->venue,
            'play_type' => $this->play_type,
            'player_registration' => $this->player_registration,
            'creator_id' => $this->creator_id,
            'creator_phone' => $this->creator_phone,
            'creator_email' => $this->creator_email,
            'auction_image' => $this->auction_image,
            'auction_code' => $this->auction_code,
            'status' => $this->status,
            'payment_qr' => $this->payment_qr,
            'currency_formatting' => $this->currency_formatting,
            'created_at' => $this->created_at->toDateTimeString(),
            'teamList' => TeamResource::collection($this->whenLoaded('teams')),
            'playerList' => PlayerResource::collection($this->whenLoaded('players')),
            'sponsors' => SponsorResource::collection($this->whenLoaded('sponsors')),
            'categories' => CategoryResource::collection($this->whenLoaded('categories')),
            // 'viewAuction' => [
            //     'teamList' => TeamResource::collection($this->whenLoaded('teams')),
            //     'playerList' => PlayerResource::collection($this->whenLoaded('players')),
            //     'currentShowPoint' => 0,
            // ],
            'pricing' => new PricingResource($this->whenLoaded('pricing')),
            'oldPricing' => new PricingResource($this->whenLoaded('oldPricing')),
            'bidSlaps' => $this->whenLoaded('bidSlaps', function () {
                return $this->bidSlaps->map(function ($bidSlap) {
                    return [
                        'upto_amount' => $bidSlap->upto_amount,
                        'increment_value' => $bidSlap->increment_value,
                    ];
                });
            }),
            'bidders' => $this->whenLoaded('bidders', function () {
                return $this->bidders->pluck('creator_id');
            }),
        ];
    }
}
