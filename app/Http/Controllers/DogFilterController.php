<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class DogFilterController extends Controller
{
    public function filterDog(Request $request){
        $request->validate([
            'training_level'
        ]);

        log::info('Get all dogs where the filter condition is matched');
        $filteredDogs = Dog::where('training_level', $request->training_level)->with('owner');
        log::info('Return the dog filtering view showing dogs that match the condition');
        return view('dog.filterTraining', compact('filteredDogs'));
    }
}
