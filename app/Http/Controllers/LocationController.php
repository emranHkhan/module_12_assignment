<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $arr = ['Dhaka', 'Chattogram', 'Comilla', "Cox's Bazar"];

        foreach ($arr as $city) {
            $location = new Location();

            $location->location = $city;

            $location->save();
        }
    }
}
