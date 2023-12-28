<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TripController extends Controller
{

    public function index(Request $request)
    {
        $date = $request->input('date');
        $from = $request->input('from');
        $to = $request->input('to');
        $params = $request->all();

        if (count($params) != 0 && empty($date)) {
            return redirect()->back()->with('error', 'Please enter a date');
        }

        if (!empty($date) && !empty($from) && !empty($to)) {
            $dateParts = explode('-', $date);
            $dateParts[0] = ltrim($dateParts[0], '0');
            $dateParts[1] = ltrim($dateParts[1], '0');
            $formattedDate = implode('-', $dateParts);

            $trips = Trip::where('from', $from)->where('to', $to)->where('departure_date', $formattedDate)->get();
            $trips->allTrips = false;
        } else {
            $trips = Trip::where('seat_count', '<>', '0')->get();
            $trips->allTrips = true;
        }

        $locations = Location::all();
        return view('trips', ["trips" => $trips, "locations" => $locations]);
    }

    public function store(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');
        $day = $request->input('day');
        $month = $request->input('month');
        $departureTime = $request->input('departure_time'); // insert the modified version
        $time_radio = $request->input('time_radio'); // don't insert in db
        $departureDate = ltrim($day, '0') . '-' . ltrim($month, '0') . '-' . date('Y');
        $departureTime = $time_radio === 'pm' ? $departureTime + 12 : $departureTime;

        if (empty($day) || empty($month)) {
            return redirect()->back()->with('error', 'Please select a day and a month.');
        } else if ($from === $to) {
            return redirect()->back()->with('error', 'Departure and Destination cannot be the same!');
        }


        $record = Trip::where('departure_date', $departureDate)->where('departure_time', $departureTime)->get();
        // check if a trip already exists with the same date and time. If not, create otherwise send an alert saying it's already avaliable.
        if ($record->isEmpty()) {
            $trip = new Trip();

            $trip->from = $from;
            $trip->to = $to;
            $trip->departure_date = $departureDate;
            $trip->departure_time = $departureTime;

            $trip->save();

            return redirect()->back()->with('success', 'Trip created successfully!');
        } else {
            return redirect()->back()->with('error', 'Trip is already available.');
        }
    }

    public function getLocations()
    {
        $locations = Location::all();
        return view('makeTrip', ['locations' => $locations]);
    }

    public function create(Request $request)
    {
        $tripId = $request['id'];

        $trip = Trip::find($tripId);

        return view("confirmTrip", ['trip' => $trip]);
    }

    public function submit(Request $request)
    {
        $name = $request->input('name');
        $mobile = $request->input('mobile');
        $tripId = $request->input('trip_id');

        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:20',
                'mobile' => 'required|numeric|digits:11',
            ]);

            $validatedData['trip_id'] = $tripId;

            $user = new User($validatedData);
            $user->save();

            return redirect()->route('trips');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Failed to save data!');
        }
    }
}
