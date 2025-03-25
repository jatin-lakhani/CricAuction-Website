<?php

namespace App\Http\Resources\V4;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlayerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'player_id' => (string) $this->id,
            'auction_id' => $this->auction_id,
            'team_id' => (isset($this->team) && isset($this->team->id)) ? (string) $this->team->id : null,
            'player_firstname' => $this->player_firstname,
            'player_mobile_no' => $this->player_mobile_no,
            'player_age' => $this->player_age,
            'player_specification_one' => $this->player_specification_one,
            'player_specification_two' => $this->player_specification_two,
            'player_specification_three' => $this->player_specification_three,
            'player_image' => $this->player_image,
            'player_crop_image' => $this->player_crop_image,
            'crichero_profile_url' => $this->crichero_profile_url,
            // 'player_teamName' => $this->player_teamName,
            'base_value' => $this->base_value ?? 0,
            'sold_value' => $this->sold_value ?? 0,
            'is_team_owner' => $this->is_team_owner,
            'is_non_playing_owner' => $this->is_non_playing_owner,
            'jersey_name' => $this->jersey_name,
            'jersey_number' => $this->jersey_number,
            'jersey_size' => $this->jersey_size,
            'category' => $this->category,
            'extra_detail' => $this->extra_detail,
            'trouser_size' => $this->trouser_size,
            'playerTeamName' => $this->playerTeamName,
            'playerFormNo' => $this->playerFormNo,
            // 'player_fathername' => $this->player_fathername,
            'playerStatus' => $this->playerStatus,
            'playerSelectedIcon' => $this->playerSelectedIcon,
            'is_reserved' => $this->is_reserved,
            'match' => $this->match,
            'run' => $this->run,
            'wicket' => $this->wicket,
            'payment_receipt' => $this->payment_receipt,
            // 'created_at' => $this->created_at->toDateTimeString(),
            // 'updated_at' => $this->updated_at->toDateTimeString(),
            // 'team' => new TeamResource($this->whenLoaded('team')),
        ];
    }
}
