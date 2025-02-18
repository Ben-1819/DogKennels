<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Dog;
use App\Models\Kennel;
use App\Models\Owner;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        log::info('Creating all_bookings variable');
        $all_bookings = Booking::all();
        log::info('Returning booking.index and passing all_bookings as the parameter');
        return view('booking.index', compact('all_bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        log::info('Creating variables for all_dogs and all_kennels');
        $all_dogs = Dog::all();
        $all_kennels = Kennel::all();
        log::info('Returning view booking.create and passing all_dogs and all_kennels as parameters');
        return view('booking.create', compact('all_dogs', 'all_kennels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dog_id' => ['required', 'integer'],
            'kennel_id' => ['required', 'integer'],
            'booking_start' => ['required', 'date'],
            'booking_end' => ['required', 'date']
        ]);

        log::info('Getting owner_id from the entered dog_id');
        $owner_id = Owner::find($request->dog_id)->select('id');
        log::info('Creating new booking');
        $booking = new Booking([
            'owner_id' => $owner_id,
            'dog_id' => $request->dog_id,
            'kennel_id' => $request->kennel_id,
            'booking_start' => $request->booking_start,
            'booking_end' => $request->booking_end
        ]);
        $booking->save();

        log::info('New Booking created');
        log::info('Owner id: {owner_id}', ['owner_id', $owner_id]);
        log::info('Dog id: {dog_id}', ['dog_id' => $request->dog_id]);
        log::info('Kennel id: {kennel_id}', ['kennel_id' => $request->kennel_id]);
        log::info('Booking start date: {booking_start}', ['booking_start' => $request->booking_start]);
        log::info('Booking end date: {booking_end}', ['booking_end' => $request->booking_end]);
        log::info('Returning to booking index');
        return redirect()->route('booking.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking, $id)
    {
        log::info('Set variables for booking, owner, dog and kennel');
        $booking = Booking::find($id);
        $owner = Owner::find($booking->owner_id);
        $dog = Dog::find($booking->dog_id);
        $kennel = Kennel::find($booking->kennel_id);
        log::info('Returning booking.show for booking: {id}', ['id' => $id]);
        return view('booking.show', compact('booking', 'owner', 'dog', 'kennel'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking, $id)
    {
        log::info('Set variables for booking, owner, dog and kennel');
        $booking = Booking::find($id);
        $ownername = Owner::find($booking->owner_id);
        $owner = Owner::all();
        $dogname = Dog::find($booking->dog_id);
        $dog = Dog::all();
        $kennel = Kennel::all();
        log::info('Returning booking.edit for booking: {id}', ['id' => $id]);
        return view('booking.edit', compact('booking', 'owner', 'dog', 'kennel', 'dogname', 'ownername'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'dog_id' => ['required', 'integer'],
            'kennel_id' => ['required', 'integer'],
            'booking_start' => ['required', 'date'],
            'booking_end' => ['required', 'date']
        ]);

        log::info('Getting owner_id from the entered dog_id');
        $owner_id = Owner::find($request->dog_id)->select('id');
        log::info('Updating booking');
        $update_booking = Booking::where('id', $request->id)->update([
            'owner_id' => $owner_id,
            'dog_id' => $request->dog_id,
            'kennel_id' => $request->kennel_id,
            'booking_start' => $request->booking_start,
            'booking_end' => $request->booking_end
        ]);

        log::info('Booking updated successfully');
        log::info('Owner id: {owner_id}', ['owner_id', $owner_id]);
        log::info('Dog id: {dog_id}', ['dog_id' => $request->dog_id]);
        log::info('Kennel id: {kennel_id}', ['kennel_id' => $request->kennel_id]);
        log::info('Booking start date: {booking_start}', ['booking_start' => $request->booking_start]);
        log::info('Booking end date: {booking_end}', ['booking_end' => $request->booking_end]);
        log::info('Returning to booking index');
        return redirect()->route('booking.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking, $id)
    {
        log::info('Deleting booking with id: {id}', ['id' => $id]);
        Booking::where('id', $id)->delete();
        log::info('Booking successfully deleted, returning to booking index');
        return redirect()->route('booking.index');
    }
}
