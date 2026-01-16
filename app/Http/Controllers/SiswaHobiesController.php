<?php

namespace App\Http\Controllers;

use App\Models\Hobbies;
use App\Models\HobbySiswa;
use App\Models\SiswaHobies;
use App\Http\Requests\SiswaHobies\StoreSiswaHobiesRequest;
use App\Http\Requests\SiswaHobies\UpdateSiswaHobiesRequest;
use App\Models\Siswas;

class SiswaHobiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswaHobbies = HobbySiswa::with(['siswa', 'hobby'])->get()->unique('id');
        $hobbies = Hobbies::all();
        $sisway = Siswas::all();
        return view('siswa_hobbies.index', compact('siswaHobbies', 'hobbies', 'sisway'));

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
    public function store(StoreSiswaHobiesRequest $request)
    {
        $siswa = Siswas::findOrFail($request->siswa_id);

        $siswa->hobbies()->sync($request->hobbies_ids);

        return redirect()->route('siswa-hobbies.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(HobbySiswa $siswaHobies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HobbySiswa $siswaHobies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSiswaHobiesRequest $request, HobbySiswa $siswaHobies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HobbySiswa $siswaHobies)
    {
        //
    }
}
