<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rentals;
use App\Models\reservations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationsController extends Controller
{
    function getCarReservations($id)
    {
        if(!Auth::check()){
            return redirect()->route('noaccess');
        }
        $rentals = reservations::where('car_id', $id)->get();
        // echo $id;
        // echo $rentals;
        $car = Car::find($id);
        return view('cars.reservecar', ['rentals' => $rentals, 'car' => $car]);
    }

    function reserveCar(Request $request, $id)
    {

        $data = request()->validate([
            'start_date' => 'required|date_format:Y-m-d|before:end_date',
            'end_date' => 'required|date_format:Y-m-d'
        ]);
        $reservations = reservations::where('car_id', $id)->get();

        foreach ($reservations as $reservation) {
            if(strtotime($data['start_date']) >= strtotime($reservation->start_date) && strtotime($data['start_date']) <= strtotime($reservation->end_date)){
                return back()->withErrors(['dateError' => 'The selected dates are already reserved']);
            }


            if(strtotime($data['end_date']) >= strtotime($reservation->start_date) && strtotime($data['end_date']) <= strtotime($reservation->end_date)){
                return back()->withErrors(['dateError' => 'The selected dates are already reserved']);
            }
        }

        $car = Car::find($id);

        $rental = new reservations();
        $rental->car_id = $id;
        $rental->user_id = auth()->user()->id;
        $rental->start_date = $data['start_date'];
        $rental->end_date = $data['end_date'];
        $price = $car->price;

        return view('cars.reservecarconfirm', ['rental' => $rental, 'price' => $price]);
    }


    function reserveConfirm(Request $request)
    {
        $rental = json_decode($request->rental);
        $finalRental = new reservations();
        $finalRental->car_id = $rental->car_id;
        $finalRental->user_id = $rental->user_id;
        $finalRental->start_date = $rental->start_date;
        $finalRental->end_date = $rental->end_date;
        $finalRental->save();
        return redirect()->route('cars.index');
    }

    public function listAllReservations()
    {

        $reservations = reservations::all();
        echo $reservations;
        return view('cars.reservations', ['reservations' => $reservations]);
    }

}
