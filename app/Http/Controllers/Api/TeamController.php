<?php

namespace App\Http\Controllers\Api;

use App\Helper\FileUploadHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TeamController extends Controller
{
    public function index(Request $request)
    {
        $teams = Team::with('players')->where('auction_id', $request->auction_id)->get();
        return apiResponse('Teams retrieved successfully', TeamResource::collection($teams));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'team_name' => 'required|string|max:255',
            'team_short_name' => 'required',
            'auction_id' => 'required|exists:auctions,id',
        ]);
        if ($validator->fails()) {
            return apiValidationError($validator->messages(), 422);
        }
        try {
            if ($request->has('id') && !empty($request->input('id'))) {
                $team = Team::find($request->id);
                if (!$team) {
                    return apiFalseResponse('Team not found.');
                }
            }
            $data = $request->all();
            if ($request->hasfile('team_image')) {
                $file = $request->file('team_image');
                $filePath = FileUploadHelper::uploadFile($file, 'upload/team_image');
                $data['team_image'] = $filePath;
            }
            if (isset($team) && $team) {
                $team->update($data);
                $message = 'Team details updated successfully';
            } else {
                $team = Team::create($data);
                $message = 'Team created successfully';
            }
            return apiResponse($message);
        } catch (\Exception $e) {
            logError($e);
            return apiErrorResponse($e->getMessage());
        }
    }

    public function show($id)
    {
        $team = Team::with('players')->find($id);
        if (!$team) {
            return apiFalseResponse('Team details not found');
        }
        return apiResponse('Team details retrieved successfully', new TeamResource($team));
    }

    public function destroy($id)
    {
        Team::destroy($id);
        return apiResponse('Team deleted successfully');
    }
}
