<?php

namespace App\Http\Controllers;

use App\Models\Siswas;
use App\Http\Requests\Siswas\StoreSiswasRequest;
use App\Http\Requests\Siswas\UpdateSiswasRequest;

class SiswasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = Siswas::all();
        return view('siswas.index',compact('siswas'));
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
    public function store(StoreSiswasRequest $request)
    {
        Siswas::create($request->validated());
        return redirect()->route('siswas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswas $siswas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswas $siswas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSiswasRequest $request, Siswas $siswa)
    {
        $siswa->update($request->all());
        return redirect()->route('siswas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswas $siswa)
    {
        $siswa->delete($siswa->id);
        return redirect()->route('siswas.index');
    }
}
