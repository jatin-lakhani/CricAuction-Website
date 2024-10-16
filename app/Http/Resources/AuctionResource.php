<?php

namespace App\Http\Resources;

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
            'auction_image' => $this->auction_image_url,
            'created_at' => $this->created_at->toDateTimeString(),
            'teams' => TeamResource::collection($this->whenLoaded('teams')),
            'players' => PlayerResource::collection($this->whenLoaded('players')),
        ];
    }
}
