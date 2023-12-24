@extends('layouts.app')

@section('content')
    <section class="container">
        <form class="w-50 mt-5 mx-auto card shadow p-3" method="post" action="{{ route('trip.submit') }}">
            @csrf
            <h2 class="text-center mb-3">Confirm Ticket</h2>
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('error') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="mb-3">
                <label for="" class="fw-semibold">Departure: </label>
                <span
                    class="text-success fw-semibold border border-success border-2 rounded px-2 py-1">{{ $trip->from }}</span>
            </div>
            <div class="mb-3">
                <label for="" class="fw-semibold">Destination: </label>
                <span
                    class="text-success fw-semibold border border-success border-2 rounded px-2 py-1">{{ $trip->to }}</span>
            </div>
            <div class="mb-3">
                <label for="" class="fw-semibold">Departure Date: </label>
                <span
                    class="text-success fw-semibold border border-success border-2 rounded px-2 py-1">{{ $trip->departure_date }}</span>
            </div>
            <div class="mb-3">
                <label for="" class="fw-semibold">Departure Time: </label>
                <span
                    class="text-success fw-semibold border border-success border-2 rounded px-2 py-1">{{ $trip->departure_time > 12 ? $trip->departure_time - 12 . ' PM' : $trip->departure_time . ' AM' }}</span>
            </div>
            <hr>
            <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Name</label>
                <input type="text" name="name" class="form-control" id="name">
                <input type="text" name="trip_id" hidden value="{{ $trip->id }}">
            </div>
            <div class="mb-3">
                <label for="mobile" class="form-label fw-semibold">Mobile</label>
                <input type="text" name="mobile" class="form-control" id="mobile">
            </div>
            <button type="submit" class="btn btn-sm bg-primary fw-semibold text-light">Confirm</button>
        </form>
    </section>
@endsection
