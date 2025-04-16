<?php

namespace App\Http\Controllers\Api\V4;

use App\Http\Controllers\Controller;
use App\Http\Resources\V4\PricingMasterResource;
use App\Models\PricingMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PricingMasterController extends Controller
{
    public function index()
    {
        $pricings = PricingMaster::all();
        return apiResponse('Pricing list retrieved successfully', PricingMasterResource::collection($pricings));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'ipaName' => 'required|string|unique:pricings',
            'price' => 'required|numeric',
            'team' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return apiValidationError($validator->messages(), 422);
        }

        try {
            if ($request->has('id') && !empty($request->input('id'))) {
                $pricing = PricingMaster::find($request->id);
                if (!$pricing) {
                    return apiFalseResponse('Pricing not found');
                }
                $pricing->update($request->all());
                return apiResponse('Pricing updated successfully', new PricingMasterResource($pricing));
            }
            $pricing = PricingMaster::create($request->all());
            return apiResponse('Pricing created successfully', new PricingMasterResource($pricing));
        } catch (\Exception $e) {
            logError($e);
            return apiErrorResponse($e->getMessage());
        }
    }

    public function show($id)
    {
        $pricing = PricingMaster::find($id);
        if (!$pricing) {
            return apiFalseResponse('Pricing not found');
        }
        return apiResponse('Pricing details retrieved successfully', new PricingMasterResource($pricing));
    }

    public function destroy($id)
    {
        try {
            $pricing = PricingMaster::find($id);
            if (!$pricing) {
                return apiFalseResponse('Pricing not found');
            }
            $pricing->delete();
            return apiResponse('Pricing deleted successfully');
        } catch (\Exception $e) {
            logError($e);
            return apiErrorResponse($e->getMessage());
        }
    }
}
