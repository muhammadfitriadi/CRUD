<?php

namespace App\Http\Controllers;

use App\Models\Nisn;
use App\Models\Siswa;
use App\Http\Requests\Nisn\StoreNisnRequest;
use App\Http\Requests\Nisn\UpdateNisnRequest;
use DB;

class NisnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nisns = Nisn::with('siswa')->get();
        $siswas = Siswa::all();
        return view('nisn.index', compact('nisns', 'siswas'));
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
    public function store(StoreNisnRequest $request)
    {
        DB::transaction(function () use ($request) {
            $siswa = Siswa::create([
                'nama' => $request->nama
            ]);

            $siswa->nisn()->create([
                'nisn' => $request->nisn
            ]);
        });

        return redirect()->route('nisn.index');

        return redirect()->route('nisn.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Nisn $nisn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nisn $nisn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNisnRequest $request, Nisn $nisn)
    {
        $nisn->update($request->all());
        return redirect()->route('nisn.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nisn $nisn)
    {
        $nisn->delete($nisn->id);
        return redirect()->route('nisn.index');
    }
}
