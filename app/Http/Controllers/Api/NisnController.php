<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Nisn\StoreNisnRequest;
use App\Http\Requests\Api\Nisn\UpdateNisnRequest;
use App\Models\Nisn;
use App\Models\Siswa;
use DB;
use Illuminate\Http\Request;

class NisnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nisns = Nisn::with('siswa')->get();
        return response()->json([
            'message' => 'Succses get data Siswa dan Nisn',
            'data' => $nisns
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
    public function store(StoreNisnRequest $request)
    {
        DB::transaction(function () use ($request, &$siswa) {
            $siswa = Siswa::create([
                'nama' => $request->nama
            ]);

            $siswa->nisn()->create([
                'nisn' => $request->nisn
            ]);
        });

        return response()->json([
            'message' => 'Success create data Siswa dan NISN',
            'data' => $siswa->load('nisn')
        ], 201);
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
        DB::transaction(function () use ($request, $nisn) {

            $nisn->siswa()->update([
                'nama' => $request->nama,
            ]);

            $nisn->update([
                'nisn' => $request->nisn,
            ]);
        });

        return response()->json([
            'message' => 'Success update data Siswa dan NISN',
            'data' => $nisn->load('siswa'),
        ], 201);
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nisn $nisn)
    {
        $nisn->delete($nisn->id);
        
        return response()->json([
            'message' => 'Success delete data Siswa dan NISN',
            'data' => $nisn->load('siswa'),
        ], 201);
    }
}
