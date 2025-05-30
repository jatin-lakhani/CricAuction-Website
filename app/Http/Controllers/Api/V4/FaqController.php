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
        return apiResponse()->json([
            'message' => 'Faq Detail List Retrieved Successfully',
            'data' => Faq::orderBy('order')->get(),
        ]);
    }

    public function show($id)
    {
        $faq = Faq::findOrFail($id);
        $message = 'Faq details retrieved successfully';

        return apiResponse()->json([
            'message' => $message,
            'data' => $faq,
        ]);
    }



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'nullable|exists:faqs,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'status' => 'in:active,inactive',
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
        Faq::findOrFail($id)->delete();
        return apiResponse()->json(['message' => 'FAQ deleted successfully']);
    }
}
