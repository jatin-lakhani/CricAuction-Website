<?php

namespace App\Http\Controllers\Api\V4;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class BlogController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Blog Detail List Retrieved Successfully',
            'data' => Blog::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'nullable|exists:blogs,id',
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'long_description' => 'required|string',
            'category' => 'nullable|string|max:255',
            'image' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            return apiValidationError($validator->messages(), 422);
        }

        try {
            if ($request->has('id') && !empty($request->input('id'))) {
                $testimonial = Blog::find($request->id);
                if (!$testimonial) {
                    return apiFalseResponse('Blog not found');
                }
                $testimonial->update($request->all());
                return apiResponse('Blog updated successfully', $testimonial);
            }
            $testimonial = Blog::create($request->all());
            return apiResponse('Blog created successfully', $testimonial);
        } catch (\Exception $e) {
            logError($e);
            return apiErrorResponse($e->getMessage());
        }
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        $message = ' Blog retrieved successfully';

        return response()->json([
            'message' => $message,
            'data' => $blog,
        ]);
    }

    public function destroy($id)
    {

        Blog::findOrFail($id)->delete();
        return response()->json(['message' => 'Blog deleted successfully','success' => true]);

    }
}
