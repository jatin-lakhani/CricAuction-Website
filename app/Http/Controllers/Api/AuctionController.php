<?php

namespace App\Http\Controllers\Api;

use App\Helper\FileUploadHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuctionResource;
use App\Models\Auction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuctionController extends Controller
{
    public function index(Request $request)
    {
        $creator_id = $request->creator_id;
        $auctions = Auction::with('teams', 'players', 'pricing', 'oldPricing')
            ->when($creator_id, function ($query) use ($creator_id) {
                $query->where('creator_id', $creator_id);
            })->get();
        return apiResponse('Auctions get successfully', AuctionResource::collection($auctions));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
			'auction_code' => 'required',
		]);

		if ($validator->fails()) {
			return apiValidationError($validator->messages());
		}
        $auction_id = 0;
        if ($request->has('auction_code') && !empty($request->input('auction_code'))) {
            $auction = Auction::where('auction_code', $request->auction_code)->first();
            // if (!$auction) {
            //     return apiFalseResponse('Auction not found.');
            // }
            if ($auction) {
                $auction_id = $auction->id;
            }
        }
        // Check if auction code exists 
        $checkAuctionCode = Auction::where('auction_code', $request->auction_code)->whereNot('id', $auction_id)->first();
        if ($checkAuctionCode) {
            return apiFalseResponse('Auction code already exists.');
        }
        if ($request->has('auction_date') && !empty($request->input('auction_date'))) {
            $request->merge([
                'auction_date' => Carbon::createFromFormat('d-m-Y', $request->auction_date)->format('Y-m-d'),
            ]);
        }
        if ($request->has('auction_time') && !empty($request->input('auction_time'))) {
            $request->merge([
                'auction_time' => Carbon::createFromFormat('h:i A', $request->auction_time)->format('H:i:s'),
            ]);
        }
        if ($request->has('player_registration') && empty($request->input('player_registration'))) {
            $request->merge([
                'player_registration' => true
            ]);
        }
        $data = $request->all();
        // if ($request->hasfile('auction_image')) {
        //     $file = $request->file('auction_image');
        //     $filePath = FileUploadHelper::uploadFile($file, 'upload/auction_image');
        //     $data['auction_image'] = $filePath;
        // }
        if (isset($auction) && $auction) {
            $auction->update($data);
            $message = 'Auction updated successfully';
        } else {
            $auction = Auction::create($data);
            $message = 'Auction created successfully';
        }
        return apiResponse($message);
    }

    public function show($id)
    {
        $auction = Auction::with('teams', 'players')->find($id);
        if (!$auction) {
            return apiFalseResponse('Auction details not found');
        }
        return apiResponse('Acution details get successfully', new AuctionResource($auction));
    }

    public function destroy($id)
    {
        Auction::where('auction_code', $id)->delete();
        return apiResponse('Auction deleted successfully');
    }
}
