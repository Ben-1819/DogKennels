<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        log::info('Setting variable all_owners');
        $all_owners = Owner::all();
        log::info('Returning to view: owner.index and passing variable all_owners');
        return view('owner.index', compact('all_owners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        log::info('Returning view to create new owner');
        return view('owner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'unique:owners']
        ]);

        log::info('Creating new owner');
        $owner = new Owner([
            'name' => $request->name,
            'email' => strtolower($request->email)
        ]);
        $owner->save();

        log::info('Successfully created new owner');
        log::info('Owners name: {name}', ['name' => $request->name]);
        log::info('Owners email: {email}', ['email' => $request->email]);

        log::info('Returning to owner index');
        return redirect()->route('owner.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Owner $owner, $id)
    {
        $owner = Owner::find($id);
        log::info('Showing view page for owner with id: {id}', ['id' => $id]);
        return view('owner.show', compact('owner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Owner $owner, $id)
    {
        $owner = Owner::find($id);
        log::info('Showing edit page for owner with id: {id}', ['id' => $id]);
        return view('owner.edit', compact('owner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Owner $owner)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'unique:owners']
        ]);

        log::info('Updating owner where id = {id}', ['id' => $request->id]);
        $update_owner = Owner::where('id', $request->id)->update([
            'name' => $request->name,
            'email' => strtolower($request->email)
        ]);

        log::info('Owner updated');
        log::info('Owners name: {name}', ['name' => $request->name]);
        log::info('Owners email: {email}', ['email' => $request->email]);
        log::info('Returning to owner index');
        return redirect()->route('owner.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Owner $owner, $id)
    {
        log::info('Deleting owner with id: {id}', ['id' => $id]);
        Owner::where('id', $id)->delete();
        log::info('Owner deleted, returning to owner index');
        return redirect()->route('owner.index');
    }
}
