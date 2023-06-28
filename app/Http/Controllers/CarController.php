<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $car = Car::find(1);
        dump($car->name);
        dump($car->model);
        dump($car->description);
        dump($car->image);
    }
}
