<?php

namespace App\Http\Controllers;

use App\Models\JenisPegawai;
use Illuminate\Http\Request;

class JenisPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datajenispegawai = JenisPegawai::latest()->get();
        return view('crud-app.tablejenispegawai', compact('datajenispegawai'));
    }

    //index api
    public function indexapi()
    {
        $datajenispegawai = JenisPegawai::latest()->get();
        return response()->json($datajenispegawai, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('crud-app.formjenispegawai');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis_pegawai' => 'required',
        ]);

        $jenispegawai = new JenisPegawai();
        $jenispegawai->jenis_pegawai = $request->jenis_pegawai;
        $jenispegawai->save();

        return redirect('/tablejenispegawai');
    }

    // store api
    public function storeapi(Request $request)
    {
        $jenispegawai = JenisPegawai::create([
            'jenis_pegawai' => $request->jenis_pegawai,
        ]);

        return response()->json($jenispegawai, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    //show api
    public function showapi(string $id)
    {
        $jenispegawai = JenisPegawai::findOrFail($id);
        return response()->json($jenispegawai, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jenispegawai = JenisPegawai::findOrFail($id);
        return view('crud-app.editjenispegawai', compact('jenispegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jenispegawai = JenisPegawai::findOrFail($id);
        $jenispegawai->jenis_pegawai = $request->jenis_pegawai;
        $jenispegawai->save();
        return redirect('/tablejenispegawai');
    }

    public function updateapi(Request $request, string $id)
    {
        $jenispegawai = JenisPegawai::findOrFail($id);
        $jenispegawai->jenis_pegawai = $request->jenis_pegawai;
        $jenispegawai->save();
        return response()->json([
            'message' => 'Jenis Pegawai updated successfully',
            'jenis_pegawai' => $jenispegawai,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jenispegawai = JenisPegawai::findOrFail($id);
        $jenispegawai->delete();
        return redirect('/tablejenispegawai');
    }

    public function destroyapi(string $id)
    {
        $jenispegawai = JenisPegawai::findOrFail($id);
        $jenispegawai->delete();
        return response()->json([
            'message' => 'Jenis Pegawai deleted successfully',
        ], 204);
    }
}
