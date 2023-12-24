@extends('layouts.app')

@section('content')
    <section class="container mb-5">
        <form class="date my-5 w-50 mx-auto card border border-0 p-3 shadow" action="">
            <h2 class="text-center fw-semibold mb-5">Filter by date and location</h2>
            <div>
                <label class="form-label fw-semibold" for="date">Departure date</label>
                <input type="text" id="date" class="form-control" name="date" placeholder="{{ date('d-m-y') }}"
                    readonly>
            </div>
            <div class="mb-3">
                <label for="from" class="form-label fw-medium">Departure</label>
                <select name="from" id="from" class="form-select">
                    @foreach ($locations as $index => $location)
                        <option value="{{ $location->location }}" @if ($index === 0) selected @endif>
                            {{ $location->location }}</option>
                        <div>{{ $location->location }}</div>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="to" class="form-label fw-medium">Destination</label>
                <select name="to" id="to" class="form-select">
                    @foreach ($locations->reverse() as $index => $location)
                        <option value="{{ $location->location }}" @if ($index === 3) selected @endif>
                            {{ $location->location }}</option>
                    @endforeach
                </select>
            </div>
            <button class="fw-semibold btn btn-primary btn-sm">Search</button>
        </form>

        <hr>
        @if (count($trips))
            <h2 class="mb-5 fw-semibold">Available Trips</h2>
            <div class="row my-5">
                @foreach ($trips as $trip)
                    <div class="col-4">
                        <div class="card m-2 shadow border-0" style="width: 18rem;">
                            <div class="card-body">
                                <div class="mb-3"><span class="fw-semibold bg-success text-light p-1 rounded">From</span>
                                    : <span
                                        class="text-capitalize p-1 border border-warning border-2 rounded">{{ $trip->from }}</span>
                                </div>
                                <div class="mb-3"><span class="fw-semibold bg-success text-light p-1 rounded">To</span>
                                    : <span
                                        class="text-capitalize p-1 border border-warning border-2 rounded">{{ $trip->to }}</span>
                                </div>
                                <div class="mb-3"><span
                                        class="fw-semibold bg-success border-2 text-light p-1 rounded">Departure
                                        Date</span> : <span
                                        class="p-1 border border-warning border-2 rounded">{{ $trip->departure_date }}</span>
                                </div>
                                <div><span class="fw-semibold bg-success text-light p-1 rounded">Departure Time</span> :
                                    @if ($trip->departure_time > 12)
                                        <span
                                            class="p-1 border border-warning border-2 rounded">{{ $trip->departure_time - 12 }}
                                            PM</span>
                                    @else
                                        <span
                                            class="p-1 border border-warning border-2 rounded">{{ $trip->departure_time }}
                                            AM</span>
                                    @endif
                                </div>
                                <a class="btn btn-sm w-100 btn-primary mt-4 fw-semibold"
                                    href="{{ route('trip.create', ['id' => $trip->id]) }}">Buy</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <h3 class="text-center">Sorry, no trip available!</h3>
        @endif
        @if (!$trips->allTrips)
            <a class="btn btn-sm bg-primary fw-semibold text-light d-block mx-auto w-25 mt-5"
                href="{{ route('trips') }}">Available trips</a>
        @endif
    </section>
@endsection
