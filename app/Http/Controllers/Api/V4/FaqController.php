<?php

namespace App\Http\Controllers\Api\V4;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    public function index()
    {
        $faq = Faq::orderBy('order')->get();

        return apiResponse('Faq Detail List Retrieved Successfully', $faq);

    }

    public function show($id)
    {
        $faq = Faq::findOrFail($id);
        return apiResponse('Faq details retrieved successfully', $faq);
    }



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'nullable|exists:faqs,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'status' => 'in:Active,Inactive',
            'order' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return apiValidationError($validator->messages(), 422);
        }

        try {
            if ($request->has('id') && !empty($request->input('id'))) {
                $testimonial = Faq::find($request->id);
                if (!$testimonial) {
                    return apiFalseResponse('FAQ not found');
                }
                $testimonial->update($request->all());
                return apiResponse('FAQ updated successfully', $testimonial);
            }
            $testimonial = Faq::create($request->all());
            return apiResponse('FAQ created successfully', $testimonial);
        } catch (\Exception $e) {
            logError($e);
            return apiErrorResponse($e->getMessage());
        }
    }


    public function destroy($id)
    {
        $faq = Faq::findOrFail($id)->delete();
        return apiResponse('FAQ deleted successfully', 200);
    }
}
