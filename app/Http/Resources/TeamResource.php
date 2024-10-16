<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
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
            'team_id' => $this->team_id,
            'team_name' => $this->team_name,
            'team_short_name' => $this->team_short_name,
            'team_max_point' => $this->team_max_point,
            'team_point' => $this->team_point,
            'shortcut_key' => $this->shortcut_key,
            'team_image' => $this->team_image_url,
            'created_at' => $this->created_at->toDateTimeString(),

            'players' => PlayerResource::collection($this->whenLoaded('players')),
        ];
    }
}
