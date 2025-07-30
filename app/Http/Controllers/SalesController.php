<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rentals;

class SalesController extends Controller
{
    
public function handoverCar(Request $request, Rentals $rental)
{
    $validated = $request->validate([
        'kilometer_start' => 'required|integer|min:0',
    ]);

    $rental->update([
        'kilometer_start' => $validated['kilometer_start'],
        'status' => 'Kiadva',
    ]);

    return response()->json(['message' => 'Az autót kiadták az ügyfélnek.']);
}
public function returnCar(Request $request, Rental $rental)
{
    $validated = $request->validate([
        'kilometer_end' => 'required|integer|min:' . $rental->kilometer_start,
    ]);

    $rental->update([
        'kilometer_end' => $validated['kilometer_end'],
        'status' => 'Visszavéve',
    ]);

    return response()->json(['message' => 'Az autót visszavették.']);
}
}
