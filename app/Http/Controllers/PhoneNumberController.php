<?php

namespace App\Http\Controllers;

use App\Models\PhoneNumber;
use App\Http\Requests\PhoneNumber\StorePhoneNumberRequest;
use App\Http\Requests\PhoneNumber\UpdatePhoneNumberRequest;
use App\Models\Siswas;

class PhoneNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $phoneNumbers = PhoneNumber::with('siswas')->get();
        $siswas = Siswas::all();
        return view('phone_number.index',compact('phoneNumbers', 'siswas'));
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
    public function store(StorePhoneNumberRequest $request)
    {
        PhoneNumber::create($request->validated());
        return redirect()->route('phone-number.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PhoneNumber $phone_number)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PhoneNumber $phone_number)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePhoneNumberRequest $request, PhoneNumber $phone_number)
    {
        $phone_number->update($request->validated());
        return redirect()->route('phone-number.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhoneNumber $phone_number)
    {
        $phone_number->delete($phone_number->id);
        return redirect()->route('phone-number.index');
    }
}
