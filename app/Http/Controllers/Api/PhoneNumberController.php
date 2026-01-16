<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PhoneNumber\StorePhoneNumberRequest;
use App\Models\PhoneNumber;
use App\Models\Siswas;
use DB;
use Illuminate\Http\Request;

class PhoneNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = Siswas::with('phone_number')->get();

        return response()->json([
            'message' => "Success get data Siswa and Phone Number",
            'data' => $siswas
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
    public function store(StorePhoneNumberRequest $request)
    {
        $validated = $request->validated();

        foreach ($validated['phone_number'] as $number) {
            PhoneNumber::create([
                'siswa_id' => $validated['siswa_id'],
                'phone_number' => $number,
            ]);
        }

        return response()->json([
            'message' => "Success create data Siswa and Phone Number"
        ], 201);

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


    public function update(Request $request, $id)
    {
        $siswa = Siswas::findOrFail($id);

        DB::transaction(function () use ($siswa, $request) {
            $siswa->phone_number()->delete();
            foreach ($request->phone_number as $phone) {
                if (!empty($phone)) {
                    $siswa->phone_number()->create(['phone_number' => $phone]);
                }
            }
        });

        return response()->json([
            'message' => "Success edit data Siswa and Phone Number"
        ], 201);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        PhoneNumber::where('siswa_id', $id)->delete();

        return response()->json([
            'message' => "Success delete data Siswa and Phone Number"
        ], 201);
    }

}
