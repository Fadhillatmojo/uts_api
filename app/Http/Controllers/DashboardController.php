<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Perkuliahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('http://127.0.0.1:9000/api/perkuliahan');
        $objectResponse = $response->body();
        $nilai_mahasiswa = json_decode($objectResponse, true);
        return view('dashboard.index')->with([
            'list_nilai_mahasiswa' => $nilai_mahasiswa,
            // 'nim' => $nilai_mahasiswa['nim'],
            // 'kode_mk' => $nilai_mahasiswa['kode_mk'],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list_mk = MataKuliah::select('kode_mk', 'nama_mk')->get();
        $list_mahasiswa = Mahasiswa::select('nim', 'nama')->get();
        return view('dashboard.create')->with([
            'list_mk' => $list_mk,
            'list_mahasiswa' => $list_mahasiswa,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nim = $request->input('nim');
        $kode_mk = $request->input('kode_mk');
        $nilai = $request->input('nilai');

        $response = Http::post('http://127.0.0.1:9000/api/perkuliahan', [
            'nim' => $nim,
            'kode_mk' => $kode_mk,
            'nilai' => $nilai,
        ]);

        if ($response->successful()) {
            return redirect()->route('nilai-mahasiswa.index')->with('success', 'Data berhasil disimpan.');
        } else {
            return back()->withErrors(['msg' => 'Gagal menyimpan data.']);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_perkuliahan)
    {
        $nilai_mahasiswa = Perkuliahan::findOrFail($id_perkuliahan);
        return view('dashboard.edit')->with([
            'nilai_mahasiswa' => $nilai_mahasiswa,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'nilai' => 'required|numeric',
        ]);
        $nim = $request->nim;
        $kode_mk = $request->kode_mk;

        $response = Http::put("http://127.0.0.1:9000/api/perkuliahan/{$nim}/{$kode_mk}", [
            'nilai' => $request->nilai,
        ]);
        // dd($request);
        // dd($response);

        if ($response->successful()) {
            return redirect()->route('nilai-mahasiswa.index')->with('success', 'Data berhasil diperbarui.');
        } else {
            return back()->withErrors(['msg' => 'Gagal memperbarui data.']);
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    }


    public function manualDelete($nim, $kode_mk)
    {
        $response = Http::delete("http://127.0.0.1:9000/api/perkuliahan/{$nim}/{$kode_mk}");

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Data berhasil terhapus.');
        } else {
            return redirect()->back()->withErrors(['msg' => 'Gagal menghapus data.']);
        }
    }
}
