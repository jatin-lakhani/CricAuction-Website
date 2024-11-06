<?php

namespace App\Http\Controllers\Api;

use App\Helper\FileUploadHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\PlayerResource;
use App\Models\Auction;
use App\Models\Player;
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
        if ($request->has('id') && !empty($request->input('id'))) {
        } else {
            $validator = Validator::make($request->all(), [
                'auction_code' => 'required',
                'team_id' => 'nullable|exists:teams,id',
                'player_id' => 'required',
                'player_firstname' => 'required|string|max:255',
                'player_mobile_no' => 'required|string|max:15',
            ]);
        }

        if (isset($validator) && $validator->fails()) {
            return apiValidationError($validator->messages(), 422);
        }

        try {
            if ($request->has('id') && !empty($request->input('id'))) {
                $player = Player::find($request->id);
                if (!$player) {
                    return apiFalseResponse('Player not found.');
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
            if ($request->hasfile('player_image')) {
                $file = $request->file('player_image');
                $filePath = FileUploadHelper::uploadFile($file, 'upload/player_image');
                $data['player_image'] = $filePath;
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

    // Retrieve player details
    public function show($id)
    {
        $player = Player::with('team')->findOrFail($id);
        if (!$player) {
            return apiFalseResponse('Player details not found');
        }
        return apiResponse('Player details retrieved successfully', new PlayerResource($player));
    }

    // Delete a player
    public function destroy($id)
    {
        Player::destroy($id);
        return apiResponse('Player deleted successfully');
    }

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
