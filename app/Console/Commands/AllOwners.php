<?php

namespace App\Console\Commands;

use App\Models\Owner;
use Illuminate\Console\Command;

class AllOwners extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:all-owners';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Returns all records from the owners table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $headers = ['id', 'name', 'email'];
        $owners = Owner::all(['id', 'name', 'email']);
        $this->table($headers, $owners);

        return 0;
    }
}
