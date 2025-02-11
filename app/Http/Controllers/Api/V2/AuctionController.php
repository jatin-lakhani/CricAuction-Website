<?php

namespace App\Http\Controllers\Api\V2;

use App\Helper\FileUploadHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuctionResource;
use App\Models\Auction;
use App\Models\Player;
use App\Models\Pricing;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuctionController extends Controller
{
    public function index(Request $request)
    {
        $creator_id = $request->creator_id;
        $auctions = Auction::with('teams.players', 'players', 'pricing', 'oldPricing')
            ->when($creator_id, function ($query) use ($creator_id) {
                $query->where('creator_id', $creator_id);
            })->get();
        return apiResponse('Auctions get successfully', AuctionResource::collection($auctions));
    }

    // public function getAuctions(Request $request)
    // {
    //     $creator_id = $request->creator_id;
    //     $auctions = Auction::when($creator_id, function ($query) use ($creator_id) {
    //         $query->where('creator_id', $creator_id);
    //     })->get();
    //     return apiResponse('Auctions get successfully', AuctionResource::collection($auctions));
    // }

    public function getAuctions(Request $request)
    {
        $creator_id = $request->creator_id;
        $creator_phone = $request->creator_phone;
        $auction_name = $request->auction_name;
        $search = $request->search;
        $sort_by = $request->sort_by ?? 'created_at';
        $sort_order = $request->sort_order ?? 'desc';
        $per_page = $request->per_page ?? 10;

        // Normalize the mobile number from the request
        $player_mobile = $request->query('player_mobile');
        if ($player_mobile) {
            // Remove spaces and + from the mobile number
            $player_mobile = preg_replace('/[\s+]/', '', $player_mobile);
        }

        $auctions = Auction::
            when($creator_id, function ($query) use ($creator_id, $player_mobile) {
                $query->where(function ($sub_query) use ($creator_id, $player_mobile) {
                    $sub_query->where('creator_id', $creator_id)
                        ->orWhere(function ($subQuery) use ($player_mobile) {
                            $subQuery->when($player_mobile, function ($playerSubQuery) use ($player_mobile) {
                                $playerSubQuery->whereHas('players', function ($q) use ($player_mobile) {
                                    // Remove spaces and + from database column during the query
                                    $q->whereRaw("REPLACE(REPLACE(player_mobile_no, ' ', ''), '+', '') = ?", [$player_mobile]);
                                });
                            });
                        });
                });
            })
            ->when($creator_phone, function ($query) use ($creator_phone) {
                $query->whereRaw("REPLACE(REPLACE(creator_phone, ' ', ''), '+', '') = ?", [$creator_phone]);
            })
            ->when($auction_name, function ($query) use ($auction_name) {
                $query->whereRaw('LOWER(auction_name) LIKE ?', ["%" . strtolower($auction_name) . "%"]);
            })
            ->when($search, function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->whereRaw('LOWER(creator_id) LIKE ?', ["%" . strtolower($search) . "%"])
                        ->orWhereRaw("REPLACE(REPLACE(creator_phone, ' ', ''), '+', '') LIKE ?", ["%" . preg_replace('/[\s+]/', '', $search) . "%"])
                        ->orWhereRaw('LOWER(auction_name) LIKE ?', ["%" . strtolower($search) . "%"]);
                });
            })
            ->orderBy($sort_by, $sort_order)
            ->with('teams', 'pricing', 'oldPricing', 'players', 'bidSlaps', 'bidders')
            ->paginate($per_page);

        $data['data'] = AuctionResource::collection($auctions);
        $data['pagination'] = [
            'current_page' => $auctions->currentPage(),
            'first_page_url' => $auctions->url(1),
            'from' => $auctions->firstItem(),
            'last_page' => $auctions->lastPage(),
            'last_page_url' => $auctions->url($auctions->lastPage()),
            'links' => $auctions->linkCollection()->toArray(),
            'next_page_url' => $auctions->nextPageUrl(),
            'path' => $auctions->path(),
            'per_page' => $auctions->perPage(),
            'prev_page_url' => $auctions->previousPageUrl(),
            'to' => $auctions->lastItem(),
            'total' => $auctions->total(),
        ];

        return apiResponse('Auctions retrieved successfully', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'auction_code' => 'required',
            'bidSlaps' => 'array',
            'bidSlaps.*.upto_amount' => 'required|numeric',
            'bidSlaps.*.increment_value' => 'required|numeric',
            'bidders' => 'nullable|string',
            // 'bidders.*.creator_id' => 'required'
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
        if ($request->has('player_registration') && is_null($request->input('player_registration'))) {
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
        if ($request->has('bidSlaps')) {
            $auction->bidSlaps()->delete();
            foreach ($request->bidSlaps as $slap) {
                $auction->bidSlaps()->create($slap);
            }
        }

        // Manage Bidders
        if ($request->has('bidders')) {
            $auction->bidders()->delete();
            if (is_string($request->bidders)) {
                $bidders = explode(',', $request->bidders);
            } else {
                $bidders = $request->bidders;
            }
            if($bidders){
                foreach ($bidders as $bidder) {
                    $auction->bidders()->create([
                        'creator_id' => $bidder,
                    ]);
                }
            }
        }
        return apiResponse($message);
    }

    public function show($id)
    {
        $auction = Auction::with('teams.players', 'players', 'pricing', 'oldPricing', 'bidSlaps', 'bidders')->where('auction_code', $id)->first();
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


    public function migrateFirebaseData()
    {
        // Read Firebase data from the JSON file
        $jsonContent = file_get_contents(storage_path('CricAuction-UserData.json'));
        $json = json_decode($jsonContent, true);

        foreach ($json['auction'] as $auctionData) {
            $auction = Auction::create([
                'auction_name' => $auctionData['auctionName'],
                'auction_date' => $auctionData['auctionDate'],
                'auction_time' => $auctionData['auctionTime'],
                'bid_increase_by' => $auctionData['bidIncreaseBy'],
                'min_bid' => $auctionData['minBid'],
                'play_type' => $auctionData['playType'],
                'player_per_team' => $auctionData['playerPerTeam'],
                'points_par_team' => $auctionData['pointsParTeam'],
                'venue' => $auctionData['venue'],
                'auction_image' => $auctionData['auctionImage'],
                'auction_code' => $auctionData['auctionCode'],
                'creator_id' => $auctionData['creatorId'],
            ]);

            if (isset($auctionData['pricing'])) {
                Pricing::create([
                    'auction_id' => $auction->id,
                    'title' => $auctionData['pricing']['title'],
                    'ipaName' => $auctionData['pricing']['ipaName'],
                    'number_of_teams' => $auctionData['pricing']['numberOfTeams'],
                    'description' => $auctionData['pricing']['description'],
                    'price' => $auctionData['pricing']['price'],
                    'is_default' => $auctionData['pricing']['isDefault'],
                    'phoneNo' => $auctionData['pricing']['phoneNo'],
                    'paymentStatus' => $auctionData['pricing']['paymentStatus'],
                    'paymentDate' => $auctionData['pricing']['paymentDate'],
                    'paymentScreenshot' => $auctionData['pricing']['paymentScreenshot'],
                ]);
            }
            if (isset($auctionData['playerList'])) {
                foreach ($auctionData['playerList'] as $playerData) {
                    $player = Player::create([
                        'auction_id' => $auction->id,
                        'player_firstname' => $playerData['playerFirstname'],
                        'player_mobile_no' => $playerData['playerMobileNo'],
                        'player_age' => $playerData['playerAge'],
                        'player_specification_one' => $playerData['playerSpecificationOne'],
                        'player_specification_two' => $playerData['playerSpecificationTwo'],
                        'player_specification_three' => $playerData['playerSpecificationThree'],
                        'player_image' => $playerData['playerImage'],
                        'base_value' => $playerData['baseValue'],
                        'sold_value' => $playerData['soldValue'],
                        'is_team_owner' => $playerData['isTeamOwner'],
                        'is_non_playing_owner' => $playerData['isNonPlayingOwner'],
                        'jersey_name' => $playerData['jerseyName'],
                        'jersey_number' => $playerData['jerseyNumber'],
                        'jersey_size' => $playerData['jerseySize'],
                        'trouser_size' => $playerData['trouserSize'],
                        'player_status' => $playerData['playerStatus'],
                        'player_selected_icon' => json_encode($playerData['playerSelectedIcon']),
                    ]);

                    if (isset($playerData['playerTeamName'])) {
                        $team = Team::firstOrCreate([
                            'team_name' => $playerData['playerTeamName'],
                        ]);

                        $player->team()->associate($team);
                        $player->save();
                    }
                }
            }

            // Insert Team data
            if (isset($auctionData['team'])) {
                foreach ($auctionData['team'] as $teamData) {
                    $team = Team::create([
                        'auction_id' => $auction->id,
                        'team_name' => $teamData['teamName'],
                        'team_image' => $teamData['teamImage'], // Handle image upload separately
                        'team_max_point' => $teamData['teamMaxPoint'],
                        'team_used_point' => $teamData['teamUsedPoint'],
                        'team_point' => $teamData['teamPoint'],
                        'max_bid' => $teamData['maxBid'],
                        'number_of_player' => $teamData['numberOfPlayer'],
                        'team_short_key' => $teamData['teamShortKey'],
                        'team_short_name' => $teamData['teamShortName'],
                    ]);
                }
            }
        }

        return 'Data migration completed successfully!';
    }
}
