<?php

namespace App\Http\Controllers\Api;

use App\Helper\FileUploadHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\PricingResource;
use App\Models\Pricing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PricingController extends Controller
{
    public function index(Request $request)
    {
        $Pricings = Pricing::all();
        return apiResponse('Pricings retrieved successfully', PricingResource::collection($Pricings));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'price' => 'numeric',
            'is_default' => 'boolean',
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
