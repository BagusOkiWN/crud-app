<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agama;
use App\Models\Pegawai;
use App\Models\JenisPegawai;
use App\Models\StatusPegawai;
use App\Models\Pendidikan;
use App\Models\JenisKelamin;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     
    public function index()
    {
        $datapegawai = DB::table('pegawai')
             ->join('agama', 'pegawai.agama_id', '=', 'agama.id')
             ->join('jenis_pegawai', 'pegawai.jenis_pegawai_id', '=', 'jenis_pegawai.id')
             ->join('status_pegawai', 'pegawai.status_pegawai_id', '=', 'status_pegawai.id')
             ->join('pendidikan', 'pegawai.pendidikan_id', '=', 'pendidikan.id')
             ->join('jenis_kelamin', 'pegawai.jenkel_id', '=', 'jenis_kelamin.id')
             ->select('pegawai.*', 'agama.nama as nama_agama', 'jenis_pegawai.jenis_pegawai as nama_jenis_pegawai', 'status_pegawai.status_pegawai as nama_status_pegawai', 'pendidikan.pendidikan as nama_pendidikan','jenis_kelamin.jenis_kelamin as nama_jenis_kelamin')
             ->get();
        return view('crud-app.tablepegawai', compact('datapegawai'));
    }

    public function indexapi()
    {
        $datapegawai = DB::table('pegawai')
            ->join('agama', 'pegawai.agama_id', '=', 'agama.id')
            ->join('jenis_pegawai', 'pegawai.jenis_pegawai_id', '=', 'jenis_pegawai.id')
            ->join('status_pegawai', 'pegawai.status_pegawai_id', '=', 'status_pegawai.id')
            ->join('pendidikan', 'pegawai.pendidikan_id', '=', 'pendidikan.id')
            ->join('jenis_kelamin', 'pegawai.jenkel_id', '=', 'jenis_kelamin.id')
            ->select(
                'pegawai.*',
                'agama.nama as nama_agama',
                'jenis_pegawai.jenis_pegawai as nama_jenis_pegawai',
                'status_pegawai.status_pegawai as nama_status_pegawai',
                'pendidikan.pendidikan as nama_pendidikan',
                'jenis_kelamin.jenis_kelamin as nama_jenis_kelamin'
            )
            ->get();

        return response()->json([
            'datapegawai' => $datapegawai], 200);
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataagama = Agama::latest()->get();
        $datajenispegawai = JenisPegawai::latest()->get();
        $datastatuspegawai = StatusPegawai::latest()->get();
        $datapendidikan = Pendidikan::latest()->get();
        $datajeniskelamin = JenisKelamin::latest()->get();
        return view('crud-app.formpegawai', compact('dataagama','datajenispegawai','datastatuspegawai', 'datapendidikan', 'datajeniskelamin'));
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'nama_pegawai' => 'required',
        'nik' => 'required',
        'jenis_pegawai_id' => 'required',
        'status_pegawai_id' => 'required',
        'unit' => 'required',
        'sub_unit' => 'required',
        'pendidikan_id' => 'required',
        'tgl_lahir' => 'required',
        'tpt_lahir' => 'required',
        'jenkel_id' => 'required',
        'agama_id' => 'required',
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('gambar')) {
        $gambar = $request->file('gambar');
        $gambarName = time() . '_' . $gambar->getClientOriginalName();
        $gambar->move('upload/', $gambarName);

        $pegawai = new Pegawai();
        $pegawai->nama_pegawai = $request->nama_pegawai;
        $pegawai->nik = $request->nik;
        $pegawai->jenis_pegawai_id = $request->jenis_pegawai_id;
        $pegawai->status_pegawai_id = $request->status_pegawai_id;
        $pegawai->unit = $request->unit;
        $pegawai->sub_unit = $request->sub_unit;
        $pegawai->pendidikan_id = $request->pendidikan_id;
        $pegawai->tgl_lahir = $request->tgl_lahir;
        $pegawai->tpt_lahir = $request->tpt_lahir;
        $pegawai->jenkel_id = $request->jenkel_id;
        $pegawai->agama_id = $request->agama_id;
        $pegawai->gambar = $gambarName; // Simpan nama file gambar
        $pegawai->save();

        return redirect('/tablepegawai');
    }
}

public function storeapi(Request $request)
    {
        $validated = $request->validate([
            'nama_pegawai' => 'required',
            'nik' => 'required',
            'jenis_pegawai_id' => 'required',
            'status_pegawai_id' => 'required',
            'unit' => 'required',
            'sub_unit' => 'required',
            'pendidikan_id' => 'required',
            'tgl_lahir' => 'required',
            'tpt_lahir' => 'required',
            'jenkel_id' => 'required',
            'agama_id' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

            $pegawai = new Pegawai();
            $pegawai->nama_pegawai = $request->nama_pegawai;
            $pegawai->nik = $request->nik;
            $pegawai->jenis_pegawai_id = $request->jenis_pegawai_id;
            $pegawai->status_pegawai_id = $request->status_pegawai_id;
            $pegawai->unit = $request->unit;
            $pegawai->sub_unit = $request->sub_unit;
            $pegawai->pendidikan_id = $request->pendidikan_id;
            $pegawai->tgl_lahir = $request->tgl_lahir;
            $pegawai->tpt_lahir = $request->tpt_lahir;
            $pegawai->jenkel_id = $request->jenkel_id;
            $pegawai->agama_id = $request->agama_id;
            if ($request->hasFile('gambar')) {
                $gambar = $request->file('gambar');
                $gambarName = time() . '_' . $gambar->getClientOriginalName();
                $gambar->move('upload/', $gambarName);
                $pegawai->gambar = $gambarName; // Save the image filename
            }
            $pegawai->save();

            return response()->json([
                'message' => 'Pegawai berhasil disimpan'], 201);
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
    $datapegawai = DB::table('pegawai')
        ->join('agama', 'pegawai.agama_id', '=', 'agama.id')
        ->join('jenis_pegawai', 'pegawai.jenis_pegawai_id', '=', 'jenis_pegawai.id')
        ->join('status_pegawai', 'pegawai.status_pegawai_id', '=', 'status_pegawai.id')
        ->join('pendidikan', 'pegawai.pendidikan_id', '=', 'pendidikan.id')
        ->join('jenis_kelamin', 'pegawai.jenkel_id', '=', 'jenis_kelamin.id')
        ->select(
            'pegawai.*',
            'agama.nama as nama_agama',
            'jenis_pegawai.jenis_pegawai as nama_jenis_pegawai',
            'status_pegawai.status_pegawai as nama_status_pegawai',
            'pendidikan.pendidikan as nama_pendidikan',
            'jenis_kelamin.jenis_kelamin as nama_jenis_kelamin'
        )
        ->where('pegawai.id', $id)
        ->first();

    if (!$datapegawai) {
        return response()->json(['message' => 'Data pegawai tidak ditemukan'], 404);
    }

    return response()->json(['datapegawai' => $datapegawai], 200);
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $datapegawai = Pegawai::findOrFail($id);
        $dataagama = Agama::latest()->get();
        $datajenispegawai = JenisPegawai::latest()->get();
        $datastatuspegawai = StatusPegawai::latest()->get();
        $datapendidikan = Pendidikan::latest()->get();
        $datajeniskelamin = JenisKelamin::latest()->get();
        return view('crud-app.editpegawai', compact('datapegawai','dataagama','datajenispegawai','datastatuspegawai', 'datapendidikan', 'datajeniskelamin'));
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $validated = $request->validate([
        'nama_pegawai' => 'required',
        'nik' => 'required',
        'jenis_pegawai_id' => 'required',
        'status_pegawai_id' => 'required',
        'unit' => 'required',
        'sub_unit' => 'required',
        'pendidikan_id' => 'required',
        'tgl_lahir' => 'required',
        'tpt_lahir' => 'required',
        'jenkel_id' => 'required',
        'agama_id' => 'required',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $pegawai = Pegawai::findOrFail($id);
    $pegawai->nama_pegawai = $request->nama_pegawai;
    $pegawai->nik = $request->nik;
    $pegawai->jenis_pegawai_id = $request->jenis_pegawai_id;
    $pegawai->status_pegawai_id = $request->status_pegawai_id;
    $pegawai->unit = $request->unit;
    $pegawai->sub_unit = $request->sub_unit;
    $pegawai->pendidikan_id = $request->pendidikan_id;
    $pegawai->tgl_lahir = $request->tgl_lahir;
    $pegawai->tpt_lahir = $request->tpt_lahir;
    $pegawai->jenkel_id = $request->jenkel_id;
    $pegawai->agama_id = $request->agama_id;

    if ($request->hasFile('gambar')) {
        if ($pegawai->gambar) {
            if(file_exists('images/' . $pegawai->gambar)){
                unlink('images/' . $pegawai->gambar);
            }
        }
        $gambar = $request->file('gambar');
        $gambarName = time() . '_' . $gambar->getClientOriginalName();
        $gambar->move('upload/', $gambarName);
        $pegawai->gambar = $gambarName; // Simpan nama file gambar
    }

    $pegawai->save();

    return redirect('/tablepegawai');
}

public function updateapi(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_pegawai' => 'required',
            'nik' => 'required',
            'jenis_pegawai_id' => 'required',
            'status_pegawai_id' => 'required',
            'unit' => 'required',
            'sub_unit' => 'required',
            'pendidikan_id' => 'required',
            'tgl_lahir' => 'required',
            'tpt_lahir' => 'required',
            'jenkel_id' => 'required',
            'agama_id' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $pegawai = Pegawai::findOrFail($id);
        $pegawai->nama_pegawai = $request->nama_pegawai;
        $pegawai->nik = $request->nik;
        $pegawai->jenis_pegawai_id = $request->jenis_pegawai_id;
        $pegawai->status_pegawai_id = $request->status_pegawai_id;
        $pegawai->unit = $request->unit;
        $pegawai->sub_unit = $request->sub_unit;
        $pegawai->pendidikan_id = $request->pendidikan_id;
        $pegawai->tgl_lahir = $request->tgl_lahir;
        $pegawai->tpt_lahir = $request->tpt_lahir;
        $pegawai->jenkel_id = $request->jenkel_id;
        $pegawai->agama_id = $request->agama_id;

        if ($request->hasFile('gambar')) {
            if ($pegawai->gambar) {
                if(file_exists('images/' . $pegawai->gambar)){
                    unlink('images/' . $pegawai->gambar);
                }
            }
            $gambar = $request->file('gambar');
            $gambarName = time() . '_' . $gambar->getClientOriginalName();
            $gambar->storeAs('upload', $gambarName, 'public'); // Save the image to the 'public/upload' directory
            $pegawai->gambar = $gambarName; // Save the image filename
        }

        $pegawai->save();

        return response()->json(['message' => 'Pegawai updated successfully'], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        if ($pegawai->gambar){
            unlink('upload/'.$pegawai->gambar);
        }
        $pegawai->delete();
        return redirect('/tablepegawai');
    }

    public function destroyapi($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();

        return response()->json(['message' => 'Pegawai deleted successfully'], 204);
    }
}
