<?php

namespace App\Http\Controllers;

use App\Notifications\BookingNotification;
use App\Models\Owner;
use Illuminate\Http\Request;

class BookingNotificationController extends Controller
{
    public function sendBookingNotification(){
        $owner = Owner::first();
        $bookingDetails = [
            "name" => "$owner->name You recieved a new booking notification",
            "text" => "You have made a booking",
            "url" => url("/"),
            "thankyou" => "You have 1 minute to confirm booking",
        ];

        $owner->notify(new BookingNotification($bookingDetails));
    }
}
