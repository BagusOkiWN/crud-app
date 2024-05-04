<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datapendidikan = Pendidikan::latest()->get();
        return view('crud-app.tablependidikanpegawai', compact('datapendidikan'));
    }

    //index api
    public function indexapi()
    {
        $datapendidikan = Pendidikan::latest()->get();
        return response()->json($datapendidikan, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('crud-app.formpendidikanpegawai');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pendidikan' => 'required',
        ]);

        $pendidikan = new Pendidikan();
        $pendidikan->pendidikan = $request->pendidikan;
        $pendidikan->save();

        return redirect('/tablependidikanpegawai');
    }

    //store api
    public function storeapi(Request $request)
    {
        $pendidikan = Pendidikan::create([
            'pendidikan' => $request->pendidikan,
        ]);

        return response()->json($pendidikan, 201);
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
        $pendidikan = Pendidikan::findOrFail($id);
        return response()->json($pendidikan, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pendidikan = Pendidikan::findOrFail($id);
        return view('crud-app.editpendidikanpegawai', compact('pendidikan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pendidikan = Pendidikan::findOrFail($id);
        $pendidikan->pendidikan = $request->pendidikan;
        $pendidikan->save();
        return redirect('/tablependidikanpegawai');
    }

    //update api
    public function updateapi(Request $request, string $id)
    {
        $pendidikan = Pendidikan::findOrFail($id);
        $pendidikan->pendidikan = $request->pendidikan;
        $pendidikan->save();
        return response()->json([
            'message' => 'Pendidikan updated successfully',
            'pendidikan' => $pendidikan,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pendidikan = Pendidikan::findOrFail($id);
        $pendidikan->delete();
        return redirect('/tablependidikanpegawai');
    }

    public function destroyapi(string $id)
    {
        $pendidikan = Pendidikan::findOrFail($id);
        $pendidikan->delete();
        return response()->json([
            'message' => 'Pendidikan deleted successfully',
        ], 204);
    }
}
