<?php

namespace App\Http\Controllers\Api\V4;

use App\Helper\FileUploadHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\V4\TeamResource;
use App\Models\Auction;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TeamController extends Controller
{
    public function index(Request $request)
    {
        $auction = Auction::where('auction_code', $request->auction_code)->first();
        $teams = [];
        if ($auction) {
            $teams = Team::with('players')->where('auction_id', $auction->id)->get();
        }
        return apiResponse('Teams retrieved successfully', TeamResource::collection($teams));
    }

    public function store(Request $request)
    {
        if ($request->has('team_id') && !empty($request->input('team_id'))) {

        } else {
            $validator = Validator::make($request->all(), [
                // 'team_id' => 'required',
                'team_name' => 'required|string|max:255',
                'team_short_name' => 'required',
                'auction_code' => 'nullable',
            ]);
            if ($validator->fails()) {
                return apiValidationError($validator->messages(), 422);
            }
        }
        try {
            $team_id = 0;
            if ($request->has('team_id') && !empty($request->input('team_id'))) {
                $team = Team::where('id', $request->team_id)->first();
                // if (!$auction) {
                //     return apiFalseResponse('Auction not found.');
                // }
                if ($team) {
                    $team_id = $team->id;
                }
            }
            // Check if auction code exists 
            // $checkTeamId = Team::where('team_id', $request->team_id)->whereNot('id', $team_id)->first();
            // if ($checkTeamId) {
            //     return apiFalseResponse(message: 'Team id already exists.');
            // }
            // if ($request->has('id') && !empty($request->input('id'))) {
            //     $team = Team::find($request->id);
            //     if (!$team) {
            //         return apiFalseResponse('Team not found.');
            //     }
            // }
            $data = $request->all();
            if ($request->has('auction_code') && !empty($request->input('auction_code'))) {
                $auction = Auction::where('auction_code', $request->auction_code)->first();
                if (!$auction) {
                    return apiFalseResponse('Auction with specified code is not found');
                }
                $data['auction_id'] = $auction->id;
            }
            // if ($request->hasfile('team_image')) {
            //     $file = $request->file('team_image');
            //     $filePath = FileUploadHelper::uploadFile($file, 'upload/team_image');
            //     $data['team_image'] = $filePath;
            // }
            if (isset($team) && $team) {
                $team->update($data);
                $message = 'Team details updated successfully';
            } else {
                if (!isset($data['auction_id']) || empty($data['auction_id'])) {
                    return apiFalseResponse('Auction code is required');
                }
                $data['teamUsedPoint'] = 0;
                $team = Team::create($data);
                $message = 'Team created successfully';
            }
            if ($auction) {
                $team->maxBid = $team->getMaxBid($auction);
                $team->save();
            }
            $data = new TeamResource($team);
            return apiResponse($message, $data);
        } catch (\Exception $e) {
            logError($e);
            return apiErrorResponse($e->getMessage());
        }
    }

    public function show($id)
    {
        $team = Team::with('players')->where('id', $id)->first();
        if (!$team) {
            return apiFalseResponse('Team details not found');
        }
        return apiResponse('Team details retrieved successfully', new TeamResource($team));
    }

    public function destroy($id)
    {
        try {
            $team = Team::find($id);
            if (!$team) {
                return apiErrorResponse('Team not found');
            }
            $playerUpdateData = [
                'playerStatus' => 0,
                'team_id' => null,
                'sold_value' => 0,
            ];
            $team->players()->update($playerUpdateData);
            $team->delete();
            return apiResponse('Team deleted successfully');
        } catch (\Exception $e) {
            logError($e);
            return apiErrorResponse($e->getMessage());
        }
    }
}
