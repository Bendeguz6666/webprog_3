<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class RepairController extends Controller
{
    public function markForService(Request $request, Car $car)
{
    $car->update(['needs_service' => true]);

    return response()->json(['message' => 'Az autót szervizelésre jelölték.']);
}

public function completeService(Request $request, Car $car)
{
    $car->update(['needs_service' => false]);

    return response()->json(['message' => 'Az autó szervizelése kész.']);
}
}
