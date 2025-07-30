<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarCategories;
use App\Models\CarTypes;
use Illuminate\Http\Request;

class CarController extends Controller
{
    function addCarForm()
    {
        $types = CarTypes::all();
        $categories = CarCategories::all();
        return view('cars.addcar', [
            'types' => $types,
            'categories' => $categories
        ]);
    }
    function addCar(Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
            'price' => 'required',
            'kilometers' => 'required',
            'type' => 'required',
            'category' => 'required'
        ]);

        $car = new Car();
        $car->name = $data['name'];
        $car->price = $data['price'];
        $car->kilometers = $data['kilometers'];
        $car->type = $data['type'];
        $car->category = $data['category'];
        $car->save();
        return redirect()->route('cars.index');
    }


    function getAllCars()
    {
        return view('cars.listcars', [
            'cars' => Car::all(),
            'types' => CarTypes::all(),
            'categories' => CarCategories::all()
        ]);
    }

    function addCategory(Request $request)
    {
        $data = request()->validate([
            'category' => 'required'
        ]);
        $category = new CarCategories();
        $category->category = $data['category'];
        $category->save();
        return back();
    }
    function addType(Request $request)
    {
        $data = request()->validate([
            'type' => 'required'
        ]);
        // $data = $request->all();
        $type = new CarTypes();
        $type->type = $data['type'];
        $type->save();
        return back();
    }

    function resetDB()
    {
        Car::truncate();
        CarCategories::truncate();
        CarTypes::truncate();
        return back();
    }

    public function addUserForm()
    {
        return view('cars.adduser'); 
    }
    
}
