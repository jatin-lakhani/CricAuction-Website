<?php

namespace App\Http\Controllers\Api\V4;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\V4\SponsorResource;
use App\Helper\FileUploadHelper;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::all();
        return apiResponse('Sponsors retrieved successfully', SponsorResource::collection($sponsors));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required',
            'sponsor_of' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($validator->fails()) {
            return apiValidationError($validator->messages(), 422);
        }

        try {
            $data = $request->all();

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filePath = FileUploadHelper::uploadFile($file, 'upload/sponsors');
                $data['image'] = $filePath;
            }
            if ($request->has('id') && !empty($request->input('id'))) {
                $sponsor = Sponsor::find($request->id);
                if (!$sponsor) {
                    return apiFalseResponse('Sponsor not found');
                }
                $sponsor->update($data);
                return apiResponse('Sponsor updated successfully', new SponsorResource($sponsor));
            }
            $sponsor = Sponsor::create($data);
            return apiResponse('Sponsor created successfully', new SponsorResource($sponsor));
        } catch (\Exception $e) {
            logError($e);
            return apiErrorResponse($e->getMessage());
        }
    }

    public function show($id)
    {
        $sponsor = Sponsor::find($id);
        if (!$sponsor) {
            return apiFalseResponse('Sponsor not found');
        }
        return apiResponse('Sponsor details retrieved', new SponsorResource($sponsor));
    }

    public function destroy($id)
    {
        try {
            $sponsor = Sponsor::find($id);
            if (!$sponsor) {
                return apiFalseResponse('Sponsor not found');
            }

            $sponsor->delete();
            return apiResponse('Sponsor deleted successfully');
        } catch (\Exception $e) {
            logError($e);
            return apiErrorResponse($e->getMessage());
        }
    }
}
