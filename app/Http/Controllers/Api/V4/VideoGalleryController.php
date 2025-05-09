<?php

namespace App\Http\Controllers\Api\V4;

use App\Models\VideoGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoGalleryController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Video List Detail Retrieved Successfully',
            'data' => VideoGallery::all(),
        ]);
    }

    public function store(Request $request)
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

            return response()->json([
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
        $message = 'Video Gallery retrieved successfully';

        return response()->json([
            'message' => $message,
            'data' => $video,
        ]);
    }

  

    public function destroy($id)
    {
        VideoGallery::findOrFail($id)->delete();
        return response()->json(['message' => 'Video deleted']);
    }
}
