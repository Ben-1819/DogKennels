<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Dog;
use App\Models\Kennel;
use App\Models\Owner;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\IsEmpty;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmation;

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
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'dog_id' => ['required', 'integer'],
            'kennel_id' => ['required', 'integer'],
            'booking_start' => ['required', 'date'],
            'booking_end' => ['required', 'date']
        ]);

        log::info('Getting owner_id from the entered dog_id');
        $findowner = Dog::find($request->dog_id);
        $owner_id = $findowner->owner_id;

        log::info('Get size of dog using find function');
        $dog_size = Dog::find($request->dog_id);
        $dogsize = $dog_size->size;
        log::info('Dog Size is: {dog_size}', ['dog_size' => $dogsize]);
        switch ($dogsize){
            case $dogsize == "Small":
                $ds = 1;
                log::info('Dog is small: $ds set to {ds}', ['ds' => $ds]);
                break;
            case $dogsize == "Medium":
                $ds = 2;
                log::info('Dog is medium: $ds set to {ds}', ['ds' => $ds]);
                break;
            case $dogsize == "Large":
                $ds = 3;
                log::info('Dog is Large: $ds set to {ds}', ['ds' => $ds]);
                break;
        }

        log::info('Get size of kennel using find function');
        $kennel_size = Kennel::find($request->kennel_id);
        $kennelsize = $kennel_size->kennel_size;
        log::info('Kennel Size is: {kennelsize}', ['kennelsize' => $kennelsize]);
        switch ($kennelsize){
            case $kennelsize == "Small":
                $ks = 1;
                log::info('Kennel is Small: $ks set to {ks}', ['ks' => $ks]);
                break;
            case $kennelsize == "Medium":
                $ks = 2;
                log::info('Kennel is Medium: $ks set to {ks}', ['ks' => $ks]);
                break;
            case $kennelsize == "Large":
                $ks = 3;
                log::info('Kennel is Large: $ks set to {ks}', ['id' => $ks]);
                break;
        }

        if ($ds <= $ks){
            $sizeCheck = true;
            log::info('Kennel is large enough for dog: $sizeCheck set to {sizeCheck}', ['sizecheck' => $sizeCheck]);
        }

        else{
            $sizeCheck = false;
            log::info('Kennel is too small for dog: $sizeCheck set to {sizeCheck}', ['sizeCheck' => $sizeCheck]);
        }

        log::info('Returning all records from the booking table where the kennel has the same id as the one entered');
        $kennelCheck = Booking::all()->where('kennel_id', $request->kennel_id);

        log::info('Checking to see if the kennel has been used for any bookings');
        if(empty($kennelCheck)){
            log::info('Returning datesfree as true as kennel has never been booked before');
            $datesfree = true;
        }
        else{
            log::info('Loop through each record in kennelCheck');
            foreach($kennelCheck as $check){
                if(Carbon::parse($request->booking_start)->between(Carbon::parse($check->booking_start), Carbon::parse($check->booking_end))){
                    log::info('Selected booking start date is not available');
                    $validStart = false;
                }
                else{
                    $validStart = true;
                }
                if(Carbon::parse($request->booking_end)->between(Carbon::parse($check->booking_start), Carbon::parse($check->booking_end))){
                    log::info('Selected booking end date is not available');
                    $validEnd = false;
                }
                else{
                    $validEnd = true;
                }
                if($validStart == false || $validEnd == false){
                    log::info('Returning to booking.index');
                    return redirect()->route('booking.index');
                }
                else{
                    $datesfree = true;
                    break;
                }
            }
        }
        log::info('Use if statement to ensure the booking meets size validation rules');
        if($sizeCheck == true){
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
            //$owner = Owner::where('id', $booking->dog_id);
            //$recipient = $findowner->email;
            Mail::to("mail@example.com")->send(new BookingConfirmation($booking));
            return redirect()->route('booking.index');
        }

        else{
            log::info('Cannot make booking - kennel is not big enough');
            return redirect()->route('booking.index');
        }

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
        $findowner = Dog::find($request->dog_id);
        $owner_id = $findowner->owner_id;

        log::info('Get size of dog using find function');
        $dog_size = Dog::find($request->dog_id);
        $dogsize = $dog_size->size;
        log::info('Dog Size is: {dog_size}', ['dog_size' => $dogsize]);
        switch ($dogsize){
            case $dogsize == "Small":
                $ds = 1;
                log::info('Dog is Small: $ds set to {ds}', ['ds' => $ds]);
                break;
            case $dogsize == "Medium":
                $ds = 2;
                log::info('Dog is Medium: $ds set to {ds}', ['ds' => $ds]);
                break;
            case $dogsize == "Large":
                $ds = 3;
                log::info('Dog is Large: $ds set to {ds}', ['ds' => $ds]);
                break;
        }

        log::info('Get size of kennel using find function');
        $kennel_size = Kennel::find($request->kennel_id);
        $kennelsize = $kennel_size->kennel_size;
        log::info('Kennel Size is: {kennelsize}', ['kennelsize' => $kennelsize]);
        switch ($kennelsize){
            case $kennelsize == "Small":
                $ks = 1;
                log::info('Kennel is Small: $ks set to {ks}', ['id' => $ks]);
                break;
            case $kennelsize == "Medium":
                $ks = 2;
                log::info('Kennel is Medium: $ks set to {ks}', ['id' => $ks]);
                break;
            case $kennelsize == "Large":
                $ks = 3;
                log::info('Kennel is Large: $ks set to {ks}', ['id' => $ks]);
                break;
        }

        if ($ds <= $ks){
            $sizeCheck = true;
            log::info('Kennel is large enough for dog: $sizeCheck set to {sizeCheck}', ['sizecheck' => $sizeCheck]);
        }

        else{
            $sizeCheck = false;
            log::info('Kennel is too small for dog: $sizeCheck set to {sizeCheck}', ['sizeCheck' => $sizeCheck]);
        }

        log::info('Returning all records from the booking table where the kennel has the same id as the one entered');
        $kennelCheck = Booking::all()->where('kennel_id', $request->kennel_id);

        log::info('Checking to see if the kennel has been used for any bookings');
        if(empty($kennelCheck)){
            log::info('Returning datesfree as true as kennel has never been booked before');
            $datesfree = true;
        }
        else{
            log::info('Loop through each record in kennelCheck');
            foreach($kennelCheck as $check){
                if(Carbon::parse($request->booking_start)->between(Carbon::parse($check->booking_start), Carbon::parse($check->booking_end))){
                    log::info('Selected booking start date is not available');
                    $validStart = false;
                }
                else{
                    $validStart = true;
                }
                if(Carbon::parse($request->booking_end)->between(Carbon::parse($check->booking_start), Carbon::parse($check->booking_end))){
                    log::info('Selected booking end date is not available');
                    $validEnd = false;
                }
                else{
                    $validEnd = true;
                }
                if($validStart == false || $validEnd == false){
                    log::info('Returning to booking.index');
                    return redirect()->route('booking.index');
                }
                else{
                    $datesfree = true;
                    break;
                }
            }
        }

        if($sizeCheck == true){
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

        else{
            log::info('Cannot update booking - kennel is too small');
            return redirect()->route('booking.index');
        }

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
