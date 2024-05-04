<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use Illuminate\Http\Request;

class AgamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataagama = Agama::latest()->get();
        return view('crud-app.tableagama', compact('dataagama'));
    }

    //index api    
    public function indexapi()
    {
        $dataagama = Agama::latest()->get();
        return response()->json($dataagama, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('crud-app.formagama');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
        ]);

        $agama = new Agama();
        $agama->nama = $request->nama;
        $agama->save();

        return redirect('/tableagama');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function showapi($id)
    {
        try {
            $agama = Agama::findOrFail($id);
            return response()->json(['nama' => $agama], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
            return response()->json(['message' => 'Data agama tidak ditemukan'], 404);
        }
    }

    //store api
    public function storeapi(Request $request)
    {
        $agama = Agama::create([
            'nama' => $request->nama,
        ]);

        return response()->json($agama, 201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $agama = Agama::findOrFail($id);
        return view('crud-app.edit', compact('agama'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $agama = Agama::findOrFail($id);
        $agama->nama = $request->nama;
        $agama->save();
        return redirect('/tableagama');
    }

    //update api
    public function updateapi(Request $request, string $id)
{
    $agama = Agama::findOrFail($id);
    $agama->nama = $request->nama;
    $agama->save();
    return response()->json([
        'message' => 'Agama updated successfully',
        'nama' => $agama,
    ], 200);
}

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        $agama = Agama::findOrFail($id);
        $agama->delete();
        return redirect('/tableagama');
    }

    //delete api
    public function destroyapi(string $id)
{
    $agama = Agama::findOrFail($id);
    $agama->delete();
    return response()->json([
        'message' => 'Agama deleted successfully',
    ], 204);
}
}
