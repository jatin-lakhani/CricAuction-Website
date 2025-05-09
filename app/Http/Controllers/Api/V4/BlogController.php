<?php

namespace App\Http\Controllers\Api\V4;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $request->validate([
            'id' => 'nullable|exists:blogs,id',
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'long_description' => 'required|string',
            'category' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blogs', 'public');
        }
        

        if (!$request->id) {
            $blog = Blog::create([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'category' => $request->category,
                'image' => $imagePath,
            ]);
            $message = 'Blog created successfully';
        } else {
            $blog = Blog::findOrFail($request->id);


            if ($request->hasFile('image')) {
                $blog->image = $imagePath;
            }

            $blog->update([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'category' => $request->category,
                'image' => $blog->image,
            ]);
            $message = 'Blog updated successfully';
        }

        return response()->json([
            'message' => $message,
            'data' => $blog,
        ]);
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
