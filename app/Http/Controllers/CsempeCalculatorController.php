<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\PaintCategory;
use Illuminate\Http\Request;

class CsempeCalculatorController extends Controller
{
    // * @param Request $request
    // * @var App\Models\TilePaint $paints
    // * @return \Illuminate\Http\JsonResponse
    public function calculate(Request $request)
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
}
