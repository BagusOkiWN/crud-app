<?php

namespace App\Http\Controllers;

use App\Models\StatusPegawai;
use Illuminate\Http\Request;

class StatusPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datastatuspegawai = StatusPegawai::latest()->get();
        return view('crud-app.tablestatuspegawai', compact('datastatuspegawai'));
    }

    //index api
    public function indexapi()
    {
        $datastatuspegawai = StatusPegawai::latest()->get();
        return response()->json($datastatuspegawai, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('crud-app.formstatuspegawai');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'status_pegawai' => 'required',
        ]);

        $statuspegawai = new StatusPegawai();
        $statuspegawai->status_pegawai = $request->status_pegawai;
        $statuspegawai->save();

        return redirect('/tablestatuspegawai');
    }

    //store api
    public function storeapi(Request $request)
    {
        $statuspegawai = StatusPegawai::create([
            'status_pegawai' => $request->status_pegawai,
        ]);

        return response()->json($statuspegawai, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function showapi(string $id)
    {
        $datastatuspegawai = StatusPegawai::findOrFail($id);
        return response()->json($datastatuspegawai, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $statuspegawai = StatusPegawai::findOrFail($id);
        return view('crud-app.editstatuspegawai', compact('statuspegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $statuspegawai = StatusPegawai::findOrFail($id);
        $statuspegawai->status_pegawai = $request->status_pegawai;
        $statuspegawai->save();
        return redirect('/tablestatuspegawai');
    }

    //update api
    public function updateapi(Request $request, string $id)
    {
        $statuspegawai = StatusPegawai::findOrFail($id);
        $statuspegawai->status_pegawai = $request->status_pegawai;
        $statuspegawai->save();
        return response()->json([
            'message' => 'Status Pegawai updated successfully',
            'status_pegawai' => $statuspegawai,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $statuspegawai = StatusPegawai::findOrFail($id);
        $statuspegawai->delete();
        return redirect('/tablestatuspegawai');
    }

    //delete api
    public function destroyapi(string $id)
    {
        $statuspegawai = StatusPegawai::findOrFail($id);
        $statuspegawai->delete();
        return response()->json([
            'message' => 'Status Pegawai deleted successfully',
        ], 204);
    }
}
