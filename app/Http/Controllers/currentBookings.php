<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Dog;
use App\Models\Booking;
use Carbon\Carbon;

class currentBookings extends Controller
{
    public function currentBookings(){
        log::info('Creating variables for dog and kennel array indexes');
        $d=0;
        $k=0;
        log::info('Creating variable date and setting it to current date');
        $date = Carbon::now();
        log::info('Creating arrays for dogs bookings');
        $dogs_on_booking = array();
        log::info('Creating array for kennels on bookings');
        $kennels_on_booking= array();
        $todays_bookings = Booking::all();
        foreach($todays_bookings as $current){
            if(Carbon::parse($date)->between(Carbon::parse($current->booking_start), Carbon::parse($current->booking_end))){
                $dogtoadd = Dog::where('id', $current->dog_id)->first();
                log::info('Adding dog to the array');
                $dogs_on_booking[$d] = $dogtoadd->name;
                log::info('Adding kennel to the array');
                $kennels_on_booking[$k] = $current->kennel_id;
                $d += 1;
                $k += 1;
            }
            else{

            }
        }

        return view('booking.current', compact('dogs_on_booking', 'kennels_on_booking'));
    }
}
