@extends('layouts.app')

@section('content')
    <section class="container">
        <form class="w-50 mx-auto my-5 card p-5" method="post" action="{{ route('ticket.store') }}">
            @csrf
            @if (session('success'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('error') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <h2 class="text-center">Make a Trip</h2>
            <div class="mb-3">
                <label for="from" class="form-label fw-medium">Departure</label>
                <select name="from" id="from" class="form-select">
                    @foreach ($locations as $index => $location)
                        <option value="{{ $location->location }}" @if ($index === 0) selected @endif>
                            {{ $location->location }}</option>
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

            <div class="mb-3 d-flex align-items-center border p-1 rounded">
                <div class="w-25">
                    <label for="departure_date" class="form-label fw-medium">Departure Date: </label>
                </div>
                <div class="d-flex w-75 gap-2">
                    <div class="d-flex justify-content-center align-items-center gap-2">
                        <label for="day" class="form-label">Day</label>
                        <input type="number" name="day" class="form-control text-center" min="1" max="31"
                            id="day" placeholder="01">
                    </div>
                    <div class="d-flex justify-content-center align-items-center gap-2">
                        <label for="day" class="form-label">Month</label>
                        <input type="number" name="month" class="form-control text-center" id="day" min="1"
                            max="12" placeholder="12">
                    </div>
                    <div class="d-flex justify-content-center align-items-center gap-2">
                        <label for="day" class="form-label">Year</label>
                        <span class="form-control bg-warning text-light fw-semibold pe-none">{{ date('Y') }}</span>
                    </div>
                </div>
            </div>

            <div class="mb-3 d-flex align-items-center gap-2 border p-1 rounded">
                <div class="d-flex align-items-center gap-2">
                    <div>
                        <label for="departure_time" class="form-label fw-medium">Departure Time: </label>
                    </div>
                    <div>
                        <select name="departure_time" id="departure_time" class="form-select">
                            <option value="1">01</option>
                            <option value="2">02</option>
                            <option value="3">03</option>
                            <option value="4">04</option>
                            <option value="5">05</option>
                            <option value="6">06</option>
                            <option value="7">07</option>
                            <option value="8" selected>08</option>
                            <option value="9">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="time_radio" id="flexRadioDefault1" value="am">
                    <label class="form-check-label" for="flexRadioDefault1">
                        AM
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="time_radio" id="flexRadioDefault2" value="pm"
                        checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        PM
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary fw-semibold">Create</button>
        </form>
    </section>
@endsection
