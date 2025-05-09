<?php

namespace App\Http\Controllers\Api\V4;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestmonialController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Testimonial Detail List Retrieved Successfully',
            'data' => Testimonial::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'nullable|exists:testimonials,id',
            'name' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'rating' => 'required|integer|min:1|max:5',
            'title' => 'required|string',
            'review' => 'required|string',
            'status' => 'required|in:Active,Inactive',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('testimonials', 'public');
        }

        if (!$request->id) {
            $testimonial = Testimonial::create([
                'name' => $request->name,
                'image' => $imagePath,
                'rating' => $request->rating,
                'title' => $request->title,
                'review' => $request->review,
                'status' => $request->status,
            ]);
            $message = 'Testimonial created successfully';
        }else {
            $testimonial = Testimonial::findOrFail($request->id);


            if ($request->hasFile('image')) {
                $testimonial->image = $imagePath;
            }

            $testimonial->update([
                'name' => $request->name,
                'rating' => $request->rating,
                'title' => $request->title,
                'review' => $request->review,
                'status' => $request->status,
                'image' => $testimonial->image,
            ]);
            $message = 'Testimonial updated successfully';
        }

        return response()->json([
            'message' => $message,
            'data' => $testimonial,
        ]);
    }
  
    public function show($id)
    {
        return response()->json([
            'message' => 'Testimonial Detail Retrieved Successfully',
            'data' => Testimonial::findOrFail($id),
        ]);
    }
    

    public function destroy($id)
    {
        Testimonial::findOrFail($id)->delete();
        return response()->json(['message' => 'Testimonial deleted']);
    }
}
