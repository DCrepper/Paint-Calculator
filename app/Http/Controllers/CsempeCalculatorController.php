<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\PaintCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CsempeCalculatorController extends Controller
{
    // * @param Request $request
    // * @var App\Models\TilePaint $paints
    // * @return \Illuminate\Http\JsonResponse
    public function calculate(Request $request): JsonResponse
    {
        $validated = request()->validate([
            'category' => 'required', // PaintCategory->name
            'type' => 'required', // a b c enum
            'm2' => 'required', // 2-75
        ]);

        $paints = PaintCategory::where('name', $validated['category'])
            ->first()
            ->paints()
            ->where('type', $validated['type'])
            ->get();

        $paintDescriptions = '';

        return response()->json([
            'paints' => $paints,
            'paintDescriptions' => $paintDescriptions,
        ]);
    }

    // * @return \Illuminate\Http\JsonResponse
    public function categories(): JsonResponse
    {
        $categories = PaintCategory::all();

        return response()->json([
            'categories' => $categories,
        ]);
    }

    // * @param PaintCategory $category
    // * @return \Illuminate\Http\JsonResponse
    public function paints(PaintCategory $category): JsonResponse
    {
        $paints = $category->paints;

        return response()->json([
            'paints' => $paints,
        ]);
    }
}
