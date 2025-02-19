<?php

namespace App\Console\Commands;

use App\Models\Dog;
use Illuminate\Console\Command;

class AllDogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:all-dogs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Return all records from the dog table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $headers = ['ID', 'Owner Id', 'Name', 'Breed', 'Size', 'Age', 'Training Level', 'Temperment', 'Extra Info', 'Feed Per Day'];
        $dogs = Dog::all(['id', 'owner_id', 'name', 'breed', 'size', 'age', 'training_level', 'temperment', 'extra_info', 'feed_per_day']);
        $this->table($headers, $dogs);

        return 0;
    }
}
