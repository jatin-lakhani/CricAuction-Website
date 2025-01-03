<?php

namespace App\Http\Controllers\Api\V2;

use App\Helper\FileUploadHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\PlayerResource;
use App\Models\Auction;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlayerController extends Controller
{
    // Fetch all players for a specific auction
    public function index(Request $request)
    {
        $sortOrder = 'asc';
        $sortField = 'player_firstname';
        if ($request->has('sort_order') && !empty($request->sort_order)) {
            $sortOrder = $request->get('sort_order');
        }
        if ($request->has('sort_field') && !empty($request->sort_field)) {
            $sortField = $request->get('sort_field');
        }
        $players = Player::query();
        if ($request->has('auction_code') && !empty($request->auction_code)) {
            $auction = Auction::where('auction_code', $request->auction_code)->first();
            if (!$auction) {
                return apiFalseResponse('Auction with specified code is not found');
            }
            $players->where('auction_id', $auction->id);
        }
        if ($request->has('id') && !empty($request->id)) {
            $players->where('id', $request->id);
        }
        if ($request->has('player_id') && !empty($request->player_id)) {
            $players->where('id', $request->player_id);
        }
        if ($request->has('team_id') && !empty($request->team_id)) {
            $players->where('team_id', $request->team_id);
        }
        $players->orderBy($sortField, $sortOrder);
        $players = $players->get();
        return apiResponse('Players retrieved successfully', PlayerResource::collection($players));
    }

    // Store or update a player
    public function store(Request $request)
    {
        if ($request->has('player_id') && !empty($request->input('player_id'))) {
        } else {
            $validator = Validator::make($request->all(), [
                'auction_code' => 'nullable',
                'team_id' => 'nullable',
                // 'player_id' => 'required',
                'player_firstname' => 'nullable|string|max:255',
                'player_mobile_no' => 'nullable|string|max:15',
            ]);
        }

        if (isset($validator) && $validator->fails()) {
            return apiValidationError($validator->messages(), 422);
        }

        try {
            $player_id = 0;
            if ($request->has('player_id') && !empty($request->input('player_id'))) {
                $player = Player::where('id', $request->player_id)->first();
                if ($player) {
                    $player_id = $player->id;
                }
            }
            if ($request->has('player_mobile_no') && !empty($request->input('player_mobile_no'))) {
                $existingPlayer = Player::where('player_mobile_no', $request->player_mobile_no)->whereNot('id', $player_id)->first();
                if ($existingPlayer) {
                    return apiFalseResponse('A player with this mobile number already exists.');
                }
            }

            $data = $request->all();
            if ($request->has('auction_code') && !empty($request->input('auction_code'))) {
                $auction = Auction::where('auction_code', $request->auction_code)->first();
                if (!$auction) {
                    return apiFalseResponse('Auction with specified code is not found');
                }
                $data['auction_id'] = $auction->id;
            }
            if ($request->has('team_id') && !empty($request->input('team_id'))) {
                $team = Team::where('id', $request->team_id)->first();
                if (!$team) {
                    return apiFalseResponse('Team with specified id is not found');
                }
                $data['team_id'] = $team->id;
            }

            if (isset($player) && $player) {
                $player->update($data);
                $message = 'Player details updated successfully';
            } else {
                $player = Player::create($data);
                $message = 'Player created successfully';
            }

            return apiResponse($message);
        } catch (\Exception $e) {
            logError($e);
            return apiErrorResponse($e->getMessage());
        }
    }


    // public function store(Request $request)
    // {
    //     if ($request->has('id') && !empty($request->input('id'))) {
    //     } else {
    //         $validator = Validator::make($request->all(), [
    //             'auction_code' => 'required|string',
    //             'team_id' => 'nullable',
    //             'player_firstname' => 'nullable|string|max:255',
    //             'player_mobile_no' => 'required|string|max:15',
    //         ]);
    //     }

    //     if (isset($validator) && $validator->fails()) {
    //         return apiValidationError($validator->messages(), 422);
    //     }

    //     try {
    //         $data = $request->all();

    //         // Get auction details
    //         if ($request->has('auction_code') && !empty($request->input('auction_code'))) {
    //             $auction = Auction::where('auction_code', $request->auction_code)->first();
    //             if (!$auction) {
    //                 return apiFalseResponse('Auction with specified code is not found');
    //             }
    //             $data['auction_id'] = $auction->id;
    //         } else {
    //             return apiFalseResponse('Auction code is required');
    //         }

    //         // Check if a player with the same mobile number exists in the same auction
    //         if ($request->has('player_mobile_no') && !empty($request->input('player_mobile_no'))) {
    //             $existingPlayer = Player::where('player_mobile_no', $request->player_mobile_no)
    //                 ->where('auction_id', $auction->id)
    //                 ->first();

    //             if ($existingPlayer) {
    //                 // Return auction details for the existing player
    //                 $existingAuction = Auction::find($existingPlayer->auction_id);
    //                 return apiFalseResponse([
    //                     'message' => 'A player with this mobile number already exists in the same auction.',
    //                     'auction' => $existingAuction
    //                 ]);
    //             }
    //         }

    //         // Check if the player exists for updating
    //         $player = null;
    //         if ($request->has('player_id') && !empty($request->input('player_id'))) {
    //             $player = Player::where('id', $request->player_id)->first();
    //         }

    //         // Create or update the player
    //         if ($player) {
    //             $player->update($data);
    //             $message = 'Player details updated successfully';
    //         } else {
    //             $player = Player::create($data);
    //             $message = 'Player created successfully';
    //         }

    //         return apiResponse($message);
    //     } catch (\Exception $e) {
    //         logError($e);
    //         return apiErrorResponse($e->getMessage());
    //     }
    // }


    // Retrieve player details
    public function show($id)
    {
        $player = Player::with('team')->where('id', $id)->first;
        if (!$player) {
            return apiFalseResponse('Player details not found');
        }
        return apiResponse('Player details retrieved successfully', new PlayerResource($player));
    }

    // Delete a player
    public function destroy($id)
    {
        Player::where('id', $id)->delete();
        return apiResponse('Player deleted successfully');
    }

    public function playerBulkStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'players' => 'required|array',
            'players.*.player_id' => 'nullable',
            'players.*.player_firstname' => 'nullable|string|max:255',
            'players.*.player_mobile_no' => 'nullable|string|max:15',
            'players.*.auction_code' => 'nullable|string',
            'players.*.team_id' => 'nullable',
        ]);

        if ($validator->fails()) {
            return apiValidationError($validator->messages());
        }
        $results = [];
        try {
            foreach ($request->players as $playerData) {
                $data = $playerData;
                if (isset($playerData['auction_code']) && !empty($playerData['auction_code'])) {
                    $auction = Auction::where('auction_code', $playerData['auction_code'])->first();
                    if ($auction) {
                        $data['auction_id'] = $auction->id;
                    } else {
                        $results[] = "Auction with code {$playerData['auction_code']} not found for player.";
                        continue;
                    }
                }
                if (isset($playerData['team_id']) && !empty($playerData['team_id'])) {
                    $team = Team::where('id', $playerData['team_id'])->first();
                    if ($team) {
                        $data['team_id'] = $team->id;
                    } else {
                        $results[] = "Team with ID {$playerData['team_id']} not found for player}.";
                        continue;
                    }
                }
                $existingPlayer = null;
                $player_id = 0;
                if (isset($playerData['player_id']) && !empty($playerData['player_id'])) {
                    $existingPlayer = Player::where('id', $playerData['player_id'])->first();
                    if ($existingPlayer) {
                        $player_id = $existingPlayer->id;
                    }
                }
                if (isset($playerData['player_mobile_no']) && !empty($playerData['player_mobile_no'])) {
                    $mobileExists = Player::where('player_mobile_no', $playerData['player_mobile_no'])->whereNot('id', $player_id)->first();
                    if ($mobileExists) {
                        $results[] = "Skipping Player with mobile {$playerData['player_mobile_no']} as mobile already exist with another player.";
                        continue;
                        // return apiFalseResponse('A player with this mobile number already exists.');
                    }
                }
                if ($existingPlayer) {
                    $existingPlayer->update($data);
                    $results[] = "Player with ID {$playerData['id']} updated successfully.";
                } else {
                    $player = Player::create($data);
                    $results[] = "Player with ID {$player->id} created successfully.";
                }
            }
            return apiResponse('Bulk player operations completed successfully', $results);
        } catch (\Exception $e) {
            logError($e);
            return apiErrorResponse($e->getMessage());
        }
    }

    // public function playerBulkStore(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'players' => 'required|array',
    //         'players.*.player_id' => 'nullable',
    //         'players.*.player_firstname' => 'nullable|string|max:255',
    //         'players.*.player_mobile_no' => 'nullable|string|max:15',
    //         'players.*.auction_code' => 'nullable|string',
    //         'players.*.team_id' => 'nullable',
    //     ]);

    //     if ($validator->fails()) {
    //         return apiValidationError($validator->messages());
    //     }

    //     $results = [];
    //     try {
    //         foreach ($request->players as $playerData) {
    //             $data = $playerData;

    //             // Validate auction and team
    //             if (isset($playerData['auction_code']) && !empty($playerData['auction_code'])) {
    //                 $auction = Auction::where('auction_code', $playerData['auction_code'])->first();
    //                 if ($auction) {
    //                     $data['auction_id'] = $auction->id;
    //                 } else {
    //                     $results[] = "Auction with code {$playerData['auction_code']} not found for player.";
    //                     continue;
    //                 }
    //             }

    //             if (isset($playerData['team_id']) && !empty($playerData['team_id'])) {
    //                 $team = Team::where('id', $playerData['team_id'])->first();
    //                 if ($team) {
    //                     $data['team_id'] = $team->id;
    //                 } else {
    //                     $results[] = "Team with ID {$playerData['team_id']} not found for player.";
    //                     continue;
    //                 }
    //             }

    //             // Check if a player with the same mobile number already exists
    //             if (isset($playerData['player_mobile_no']) && !empty($playerData['player_mobile_no'])) {
    //                 $existingPlayer = Player::where('player_mobile_no', $playerData['player_mobile_no'])->first();
    //                 if ($existingPlayer) {
    //                     $results[] = "Player with mobile number {$playerData['player_mobile_no']} already exists. Skipping this player.";
    //                     continue; // Skip this player as the mobile number already exists
    //                 }
    //             }

    //             // Check if updating an existing player or creating a new one
    //             if (isset($playerData['player_id']) && !empty($playerData['player_id'])) {
    //                 $existingPlayer = Player::where('id', $playerData['player_id'])->first();
    //             }

    //             if ($existingPlayer) {
    //                 // If the player exists, update the player data
    //                 $existingPlayer->update($data);
    //                 $results[] = "Player with ID {$playerData['player_id']} updated successfully.";
    //             } else {
    //                 // If no existing player, create a new one
    //                 $player = Player::create($data);
    //                 $results[] = "Player with ID {$player->id} created successfully.";
    //             }
    //         }

    //         return apiResponse('Bulk player operations completed successfully', $results);
    //     } catch (\Exception $e) {
    //         logError($e);
    //         return apiErrorResponse($e->getMessage());
    //     }
    // }


    // Store a masked player with only name and masked mobile number
    public function storeMaskedPlayer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'player_firstname' => 'required|string|max:255',
            'player_mobile_no' => 'required|string|max:15',
        ]);

        if ($validator->fails()) {
            return apiValidationError($validator->messages(), 422);
        }

        // Mask the mobile number (e.g., hide all but the last 4 digits)
        $maskedMobileNumber = str_repeat('*', strlen($request->player_mobile_no) - 4) . substr($request->player_mobile_no, -4);

        try {
            $player = Player::create([
                'player_firstname' => $request->player_firstname,
                'player_mobile_no' => $maskedMobileNumber,
                'auction_id' => $request->auction_id,  // Assuming auction_id is required
            ]);

            return apiResponse('Masked player created successfully', new PlayerResource($player));
        } catch (\Exception $e) {
            logError($e);
            return apiErrorResponse($e->getMessage());
        }
    }
}
