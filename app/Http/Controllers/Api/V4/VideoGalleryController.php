<?php

namespace App\Http\Controllers\Api\V4;

use App\Models\VideoGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class VideoGalleryController extends Controller
{
    public function index()
    {
        return apiResponse('Video List Retrieved Successfully', VideoGallery::all());
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'nullable|exists:video_galleries,id',
            'title' => 'required|string',
            'thumb_image' => 'nullable|url',
            'url' => 'required|url',
            'type' => 'required|in:Auction,Demo',
        ]);

        if ($validator->fails()) {
            return apiValidationError($validator->messages(), 422);
        }

        try {
            if ($request->has('id') && !empty($request->input('id'))) {
                $testimonial = VideoGallery::find($request->id);
                if (!$testimonial) {
                    return apiFalseResponse('Video Gallery not found');
                }
                $testimonial->update($request->all());
                return apiResponse('Video Gallery updated successfully', $testimonial);
            }
            $testimonial = VideoGallery::create($request->all());
            return apiResponse('Video Gallery created successfully', $testimonial);
        } catch (\Exception $e) {
            logError($e);
            return apiErrorResponse($e->getMessage());
        }
    }

    public function storeold(Request $request)
    {
        try {
            $request->validate([
                'id' => 'nullable|exists:video_galleries,id',
                'title' => 'required|string',
                'thumb_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
                'url' => 'required|url',
                'type' => 'required|in:Auction,Demo',
            ]);

            $imagePath = null;
            if ($request->hasFile('thumb_image')) {
                $imagePath = $request->file('thumb_image')->store('videogallery', 'public');
            }

            if (!$request->id) {
                $video = VideoGallery::create([
                    'title' => $request->title,
                    'url' => $request->url,
                    'type' => $request->type,
                    'thumb_image' => $imagePath,
                ]);
                $message = 'Video created successfully';
            } else {
                $video = VideoGallery::findOrFail($request->id);

                if ($request->hasFile('thumb_image')) {
                    $video->thumb_image = $imagePath;
                }

                $video->update([
                    'title' => $request->title,
                    'url' => $request->url,
                    'type' => $request->type,
                    'thumb_image' => $video->thumb_image,
                ]);

                $message = 'Video updated successfully';
            }

            return apiResponse()->json([
                'message' => $message,
                'data' => $video,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'Failed to store video',
                'debug' => $e->getMessage(),
            ], 500);
        }
    }

   
    
    public function show($id)
    {

        $video = VideoGallery::findOrFail($id);
        return apiResponse('Video Gallery details retrieved successfully', ($video));
    }

    public function destroy($id)
    {
        VideoGallery::findOrFail($id)->delete();
        return apiResponse('Video deleted successfully',200);
    }
}
