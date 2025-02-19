<?php

namespace App\Console\Commands;

use App\Models\Booking;
use Illuminate\Console\Command;

class AllBookings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:all-bookings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Returns all records from the booking table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $headers = ['ID', 'Owner ID', 'Dog ID', 'Kennel ID', 'Start Date', 'End Date'];
        $bookings = Booking::all(['id', 'owner_id', 'dog_id', 'kennel_id', 'booking_start', 'booking_end']);
        $this->table($headers, $bookings);

        return 0;
    }
}
