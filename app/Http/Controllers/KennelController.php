<?php

namespace App\Http\Controllers;

use App\Models\Kennel;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class KennelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        log::info('Setting the all_kennels variable');
        $all_kennels = Kennel::all()->sortBy('id');
        log::info('Returning view kennel.index with parameter all_kennels');
        return view('kennel.index', compact('all_kennels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        log::info('Showing view to create a new kennel');
        return view('kennel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kennel_size' => ['required', 'string'],
            'kennel_type' => ['required', 'string']
        ]);

        log::info('Creating new kennel');
        $kennel = new Kennel([
            'kennel_size' => $request->kennel_size,
            'kennel_type' => $request->kennel_type
        ]);
        $kennel->save();

        log::info('New kennel created');
        log::info('Kennel size: {kennel_size}', ['kennel_size' => $request->kennel_size]);
        log::info('Kennel type: {kennel_type}', ['kennel_type' => $request->kennel_type]);
        log::info('Returning to kennel.index');
        return redirect()->route('kennel.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kennel $kennel, $id)
    {
        log::info('Showing kennel.show for kennel with id: {id}', ['id' => $id]);
        $kennel = Kennel::find($id);
        return view('kennel.show', compact('kennel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kennel $kennel, $id)
    {
        log::info('Showing kennel.edit for kennel with id: {id}', ['id' => $id]);
        $kennel = Kennel::find($id);
        return view('kennel.edit', compact('kennel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kennel $kennel)
    {
        $request->validate([
            'kennel_size' => ['required', 'string'],
            'kennel_type' => ['required', 'string']
        ]);

        log::info('Updating kennel with id: {id}', ['id' => $request->id]);
        $update_kennel = Kennel::where('id', $request->id)->update([
            'kennel_size' => $request->kennel_size,
            'kennel_type' => $request->kennel_type
        ]);

        log::info('Kennel updated');
        log::info('Kennel size: {kennel_size}', ['kennel_size' => $request->kennel_size]);
        log::info('Kennel type: {kennel_type}', ['kennel_type' => $request->kennel_type]);
        log::info('Returning to kennel.index');
        return redirect()->route('kennel.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kennel $kennel, $id)
    {
        log::info('Deleting kennel with id: {id}', ['id' => $id]);
        Kennel::where('id', $id)->delete();
        log::info('Kennel deleted, returning to kennel.index');
        return redirect()->route('kennel.index');
    }
}
