<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Track;
use Owenoj\LaravelGetId3\GetId3; 

class Trackcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('track.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Track $track)
       {
        // dd($request->input('track'));

        if($request->hasFile('track')) {

            $file = new GetId3($request->file('track'));

            $validated = $request->validate([
                'track' => 'required',
            ]);
            
            if($validated){
                $request->file('track')->store('public/uploads/tracks');
                $track->create($validated);
            }{

            }
            $track->addMediaFromRequest('track')
                  ->preservingOriginal()
                  ->toMediaCollection('tracks');
            // return dd($track->extractInfo());
        }
        // dd("there ws an error");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
