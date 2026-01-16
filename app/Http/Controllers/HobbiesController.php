<?php

namespace App\Http\Controllers;

use App\Models\Hobbies;
use App\Http\Requests\Hobbies\StoreHobbiesRequest;
use App\Http\Requests\Hobbies\UpdateHobbiesRequest;

class HobbiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hobby =  Hobbies::all();
        return view('hobbies.index', compact('hobby'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHobbiesRequest $request)
    {
        Hobbies::create($request->validated());
        $hobby = Hobbies::all();
        return redirect()->route('hobbies.index', compact('hobby'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Hobbies $hobbies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hobbies $hobbies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHobbiesRequest $request, Hobbies $hobby)
    {
        $hobby->update($request->all());
        return redirect()->route('hobbies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hobbies $hobby)
    {
        $hobby->delete($hobby->id);
        return redirect()->route('hobbies.index');
    }
}
