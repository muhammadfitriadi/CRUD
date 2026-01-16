<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hobbies\StoreHobbiesRequest;
use App\Http\Requests\Hobbies\UpdateHobbiesRequest;
use App\Models\Hobbies;
use Illuminate\Http\Request;

class HobbiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hobby = Hobbies::all();
        return response()->json([
            'message' => 'Succses get data Hobbies',
            'data' => $hobby
        ], 200);
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
        $data = Hobbies::create($request->validated());
        return response()->json([
            'message' => 'Succses create data Hobbies',
            'data' => $data
        ], 201);
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
        return response()->json([
            'message' => 'Succses update data Hobbies',
            'data' => $hobby
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hobbies $hobby)
    {
       $hobby->delete($hobby->id);
        return response()->json([
            'message' => 'Succses delete data Hobbies',
            'data' => $hobby
        ], 201);
    }
}
