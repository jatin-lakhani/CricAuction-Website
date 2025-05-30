<?php

namespace App\Http\Controllers\Api\V4;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TestmonialController extends Controller
{
    public function index()
    {
        return apiResponse('Testimonial Detail List Retrieved Successfully', Testimonial::all() );
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'nullable|exists:testimonials,id',
            'name' => 'required|string',
            'image' => 'nullable|url',
            'rating' => 'required|integer|min:1|max:5',
            'title' => 'required|string',
            'review' => 'required|string',
            'status' => 'required|in:Active,Inactive',
        ]);

        if ($validator->fails()) {
            return apiValidationError($validator->messages(), 422);
        }

        try {
            if ($request->has('id') && !empty($request->input('id'))) {
                $testimonial = Testimonial::find($request->id);
                if (!$testimonial) {
                    return apiFalseResponse('Testimonial not found');
                }
                $testimonial->update($request->all());
                return apiResponse('Testimonial updated successfully', $testimonial);
            }
            $testimonial = Testimonial::create($request->all());
            return apiResponse('Testimonial created successfully', $testimonial);
        } catch (\Exception $e) {
            logError($e);
            return apiErrorResponse($e->getMessage());
        }
    }

    public function show($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return apiResponse('Testimonial Detail Retrieved Successfully', $testimonial);
    }


    public function destroy($id)
    {
        Testimonial::findOrFail($id)->delete();
        return apiResponse('Testimonial deleted successfully', 200);
    }
}
