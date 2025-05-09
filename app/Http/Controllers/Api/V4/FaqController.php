<?php

namespace App\Http\Controllers\Api\V4;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Faq Detail List Retrieved Successfully',
            'data' => Faq::orderBy('order')->get(),
        ]);
    }

    public function show($id)
    {
        $faq = Faq::findOrFail($id);
        $message = 'Faq details retrieved successfully';

        return response()->json([
            'message' => $message,
            'data' => $faq,
        ]);
    }

    public function store(Request $request)
{
    $request->validate([
        'id' => 'nullable|exists:faqs,id',
        'question' => 'required|string|max:255',
        'answer' => 'required|string',
        'status' => 'in:active,inactive',
        'order' => 'nullable|integer',
    ]);

    $order = $request->order ?? 1;

    // If it's a create (no ID), shift existing order if conflict exists
    if (!$request->id) {
        Faq::where('order', '>=', $order)->increment('order');
        $faq = Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'status' => $request->status ?? 'active',
            'order' => $order,
        ]);
        $message = 'FAQ created successfully';
    } else {
        // For update, optionally shift order if changed
        $faq = Faq::findOrFail($request->id);

        if ($faq->order != $order) {
            // Avoid order conflict: shift others if needed
            Faq::where('order', '>=', $order)->where('id', '!=', $faq->id)->increment('order');
        }

        $faq->update([
            'question' => $request->question,
            'answer' => $request->answer,
            'status' => $request->status ?? 'active',
            'order' => $order,
        ]);
        $message = 'FAQ updated successfully';
    }

    return response()->json([
        'message' => $message,
        'data' => $faq,
    ]);
}


    public function destroy($id)
    {
        Faq::findOrFail($id)->delete();
        return response()->json(['message' => 'FAQ deleted successfully']);
    }
}
