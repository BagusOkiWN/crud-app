<?php

namespace App\Http\Controllers;

use App\Models\JenisKelamin;
use Illuminate\Http\Request;

class JenisKelaminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datajeniskelamin = JenisKelamin::latest()->get();
        return view('crud-app.tablejeniskelaminpegawai', compact('datajeniskelamin'));
    }

    //index api
    public function indexapi()
    {
        $datajeniskelamin = JenisKelamin::latest()->get();
        return response()->json($datajeniskelamin, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('crud-app.formjeniskelaminpegawai');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis_kelamin' => 'required',
        ]);

        $jenkel = new JenisKelamin();
        $jenkel->jenis_kelamin = $request->jenis_kelamin;
        $jenkel->save();

        return redirect('/tablejeniskelaminpegawai');
    }

    //store api
    public function storeapi(Request $request)
    {
        $jenkel = JenisKelamin::create([
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return response()->json($jenkel, 201);
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
        $jenkel = JenisKelamin::findOrFail($id);
        return response()->json($jenkel, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jenkel = JenisKelamin::findOrFail($id);
        return view('crud-app.editjeniskelaminpegawai', compact('jenkel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jenkel = JenisKelamin::findOrFail($id);
        $jenkel->jenis_kelamin = $request->jenis_kelamin;
        $jenkel->save();
        return redirect('/tablejeniskelaminpegawai');
    }

    //update api
    public function updateapi(Request $request, string $id)
    {
        $jenkel = JenisKelamin::findOrFail($id);
        $jenkel->jenis_kelamin = $request->jenis_kelamin;
        $jenkel->save();
        return response()->json([
            'message' => 'Jenis Kelamin updated successfully',
            'pendidikan' => $jenkel,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jenkel = JenisKelamin::findOrFail($id);
        $jenkel->delete();
        return redirect('/tablejeniskelaminpegawai');
    }

    public function destroyapi(string $id)
    {
        $jenkel = JenisKelamin::findOrFail($id);
        $jenkel->delete();
        return response()->json([
            'message' => 'Jenis Kelamin deleted successfully',
        ], 204);
    }
}
