<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use App\Models\Owner;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class DogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        log::info('Setting variable all_dogs');
        $all_dogs = Dog::all();
        log::info('Returning to view dog.index and passing all_dogs as parameter');
        return view('dog.index', compact('all_dogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        log::info('Showing view to create new dog');
        $owner = Owner::all();
        return view('dog.create', compact('owner'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'owner_id' => ['required', 'integer'],
            'name' => ['required', 'string'],
            'breed' => ['required', 'string'],
            'size' => ['required', 'string'],
            'age' => ['required', 'integer'],
            'training_level' => ['required', 'string'],
            'temperment' => ['required', 'string'],
            'extra_info' => ['string'],
            'feed_per_day' => ['required', 'integer']
        ]);

        log::info('Creating new dog');
        $dog = new Dog([
            'owner_id' => $request->owner_id,
            'name' => $request->name,
            'breed' => $request->breed,
            'size' => $request->size,
            'age' => $request->age,
            'training_level' => $request->training_level,
            'temperment' => $request->temperment,
            'extra_info' => $request->extra_info,
            'feed_per_day' => $request->feed_per_day
        ]);
        $dog->save();
        log::info('Created new dog');
        log::info('Dog owner: {owner}', ['owner' => $request->owner_id]);
        log::info('Dog name: {name}', ['name' => $request->name]);
        log::info('Dog breed: {breed}', ['breed' => $request->breed]);
        log::info('Dog size: {size}', ['size' => $request->size]);
        log::info('Dog age: {age}', ['age' => $request->age]);
        log::info('Dog training level: {training_level}', ['training_level' => $request->training_level]);
        log::info('Extra info: {extra_info}', ['extra_info' => $request->extra_info]);
        log::info('Times to feed per day: {feed_per_day}', ['feed_per_day' => $request->feed_per_day]);
        log::info('Returning to dog index');
        return redirect()->route('dog.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dog $dog, $id)
    {
        log::info('Showing dog.show for dog with id: {id}', ['id' => $id]);
        $dog = Dog::find($id);
        $owner = Owner::find($dog->owner_id);
        return view('dog.show', compact('dog', 'owner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dog $dog, $id)
    {
        log::info('Showing dog.edit for dog with id: {id}', ['id' => $id]);
        $dog = Dog::find($id);
        $owner = Owner::all();
        return view('dog.edit', compact('dog', 'owner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dog $dog)
    {
        $request->validate([
            'owner_id' => ['required', 'integer'],
            'name' => ['required', 'string'],
            'breed' => ['required', 'string'],
            'size' => ['required', 'string'],
            'age' => ['required', 'integer'],
            'training_level' => ['required', 'string'],
            'temperment' => ['required', 'string'],
            'extra_info' => ['string'],
            'feed_per_day' => ['required', 'integer']
        ]);

        log::info('Updating dog with id: {id}', ['id' => $request->id]);
        $update_dog = Dog::where('id', $request->id)->update([
            'owner_id' => $request->owner_id,
            'name' => $request->name,
            'breed' => $request->breed,
            'size' => $request->size,
            'age' => $request->age,
            'training_level' => $request->training_level,
            'temperment' => $request->temperment,
            'extra_info' => $request->extra_info,
            'feed_per_day' => $request->feed_per_day
        ]);

        log::info('Updated dog');
        log::info('Dog owner: {owner}', ['owner' => $request->owner_id]);
        log::info('Dog name: {name}', ['name' => $request->name]);
        log::info('Dog breed: {breed}', ['breed' => $request->breed]);
        log::info('Dog size: {size}', ['size' => $request->size]);
        log::info('Dog age: {age}', ['age' => $request->age]);
        log::info('Dog training level: {training_level}', ['training_level' => $request->training_level]);
        log::info('Extra info: {extra_info}', ['extra_info' => $request->extra_info]);
        log::info('Times to feed per day: {feed_per_day}', ['feed_per_day' => $request->feed_per_day]);
        log::info('Returning to dog index');
        return redirect()->route('dog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dog $dog, $id)
    {
        log::info('Deleting dog with id: {id}', ['id' => $id]);
        Dog::where('id',$id)->delete();
        log::info('Dog deleted, returning to dog index');
        return redirect()->route('dog.index');
    }
}
