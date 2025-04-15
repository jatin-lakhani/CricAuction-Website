<?php

namespace App\Http\Controllers\Api\V4;

use App\Http\Controllers\Controller;
use App\Http\Resources\V4\BankDetailResource;
use App\Models\BankDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BankDetailController extends Controller
{
    public function index()
    {
        $bankDetails = BankDetail::latest()->get();
        return apiResponse('Bank details retrieved successfully', BankDetailResource::collection($bankDetails));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'accountNo' => 'required|string',
            'accountType' => 'required|string',
            'bankName' => 'required|string',
            'ifscCode' => 'required|string',
            'upiId' => 'nullable|string',
            'paypalId' => 'nullable|string|email',
            'whContact' => 'required',
        ]);

        if ($validator->fails()) {
            return apiValidationError($validator->messages(), 422);
        }

        try {
            if ($request->has('id') && !empty($request->input('id'))) {
                $bankDetail = BankDetail::find($request->id);
                if (!$bankDetail) {
                    return apiFalseResponse('Bank detail not found');
                }
                $bankDetail->update($request->all());
                return apiResponse('Bank detail updated successfully', new BankDetailResource($bankDetail));
            }
            $bankDetail = BankDetail::create($request->all());
            return apiResponse('Bank detail created successfully', new BankDetailResource($bankDetail));
        } catch (\Exception $e) {
            logError($e);
            return apiErrorResponse($e->getMessage());
        }
    }

    public function show($id)
    {
        $bankDetail = BankDetail::find($id);
        if (!$bankDetail) {
            return apiFalseResponse('Bank detail not found');
        }
        return apiResponse('Bank detail retrieved successfully', new BankDetailResource($bankDetail));
    }

    public function destroy($id)
    {
        try {
            $bankDetail = BankDetail::find($id);
            if (!$bankDetail) {
                return apiFalseResponse('Bank detail not found');
            }
            $bankDetail->delete();
            return apiResponse('Bank detail deleted successfully');
        } catch (\Exception $e) {
            logError($e);
            return apiErrorResponse($e->getMessage());
        }
    }
}
