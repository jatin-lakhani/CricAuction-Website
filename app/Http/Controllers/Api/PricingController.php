<?php

namespace App\Http\Controllers\Api;

use App\Helper\FileUploadHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\PricingResource;
use App\Models\Auction;
use App\Models\Pricing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PricingController extends Controller
{
    public function index(Request $request)
    {
        $Pricings = Pricing::query();
        $auction = Auction::where('auction_code', $request->auction_code)->first();
        if ($auction) {
            $Pricings->where('auction_id', $auction->id);
        }
        // if ($request->has('auction_id') && !empty($request->auction_id)) {
        //     $Pricings->where('auction_id', $request->auction_id);
        // }
        if ($request->has('id') && !empty($request->id)) {
            $Pricings->where('id', $request->id);
        }
        $Pricings = $Pricings->latest()->get();
        return apiResponse('Pricings retrieved successfully', PricingResource::collection($Pricings));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'auction_code' => 'required',
            'title' => 'required|string|max:255',
            'price' => 'numeric',
            // 'is_default' => 'boolean',
        ]);
        if ($validator->fails()) {
            return apiValidationError($validator->messages(), 422);
        }
        try {
            if ($request->has('id') && !empty($request->input('id'))) {
                $Pricing = Pricing::find($request->id);
                if (!$Pricing) {
                    return apiFalseResponse('Pricing not found.');
                }
            }
            $data = $request->all();
            $auction = Auction::where('auction_code', $request->auction_code)->first();
            if (!$auction) {
                return apiFalseResponse('Auction with specified code is not found');
            }
            $checkPricingForAuctionExists = Pricing::where('auction_id', $auction->id)->whereNot('id', $request->id)->first();
            // if ($checkPricingForAuctionExists) {
            //     return apiFalseResponse('Pricing with this auction already exists.');
            // }
            $data['auction_id'] = $auction->id;
            // if ($request->hasfile('paymentScreenshot')) {
            //     $file = $request->file('paymentScreenshot');
            //     $filePath = FileUploadHelper::uploadFile($file, 'upload/paymentScreenshot');
            //     $data['paymentScreenshot'] = $filePath;
            // }

            if (isset($Pricing) && $Pricing) {
                $Pricing->update($data);
                $message = 'Pricing details updated successfully';
            } else {
                $Pricing = Pricing::create($data);
                $message = 'Pricing created successfully';
            }
            return apiResponse($message);
        } catch (\Exception $e) {
            logError($e);
            return apiErrorResponse($e->getMessage());
        }
    }

    public function show($id)
    {
        $Pricing = Pricing::find($id);
        if (!$Pricing) {
            return apiFalseResponse('Pricing details not found');
        }
        return apiResponse('Pricing details retrieved successfully', new PricingResource($Pricing));
    }

    public function destroy($id)
    {
        Pricing::destroy($id);
        return apiResponse('Pricing deleted successfully');
    }
}
