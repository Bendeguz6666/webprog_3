<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rentals;
use App\Models\reservations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
{

    public function getCarRentals($id)
    {
        if(Auth::check() == false){
            return redirect()->route('noaccess');
        }
        $rentals = Rentals::where('car_id', $id)->get();
        $car = Car::find($id);
        return view('cars.rentcar', ['rentals' => $rentals, 'car' => $car]);
    }

    function rentForm($id){
        // $id = 1;
        $rental = reservations::find($id);
        return view('cars.rentform', ['rental' => $rental]);
    }
    function rentCar(Request $request)
    {
        echo $request;

        $finalRental = new Rentals();
        $finalRental->car_id = $request->car_id;
        $finalRental->user_id = $request->user_id;
        $finalRental->end_date = $request->end_date;
        $finalRental->car_km = $request->kilometers;
        $finalRental->save();
        return redirect()->route('cars.index');
    }

}
