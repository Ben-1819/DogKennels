<?php

namespace App\Console\Commands;

use App\Models\Kennel;
use Illuminate\Console\Command;

class AllKennels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:all-kennels';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Return all records from the kennels table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $header = ['ID', 'Kennel Size', 'Kennel Type'];
        $kennels = Kennel::all(['id', 'kennel_size', 'kennel_type']);
        $this->table($header, $kennels);

        return 0;
    }
}
