<?php

namespace App\Http\Controllers;

use App\Models\Perkuliahan;
use Illuminate\Http\Request;

class PerkuliahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nilai_mahasiswa = Perkuliahan::select('perkuliahan.id_perkuliahan', 'mahasiswa.nim', 'mahasiswa.nama', 'mahasiswa.alamat', 'matakuliah.kode_mk', 'matakuliah.nama_mk', 'matakuliah.sks', 'perkuliahan.nilai')
            ->join('mahasiswa', 'perkuliahan.nim', '=', 'mahasiswa.nim')
            ->join('matakuliah', 'perkuliahan.kode_mk', '=', 'matakuliah.kode_mk')
            ->orderBy('perkuliahan.id_perkuliahan')
            ->get();
        return response()->json($nilai_mahasiswa);
    }

    /**
     * Store a newly created resource in storage.
     */
    // c. Memasukkan nilai baru untuk mahasiswa tertentu
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'kode_mk' => 'required',
            'nilai' => 'required|numeric',
        ]);

        Perkuliahan::create($request->all());
        return response()->json([
            'status' => 'success',
            'message' => 'Data Berhasil Terunggah',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    // b. Menampilkan nilai mahasiswa tertentu (berdasarkan parameter nim)
    public function show($nim)
    {
        $nilai_mahasiswa = Perkuliahan::select('mahasiswa.nim', 'mahasiswa.nama', 'mahasiswa.alamat', 'matakuliah.kode_mk', 'matakuliah.nama_mk', 'matakuliah.sks', 'perkuliahan.nilai')
            ->join('mahasiswa', 'perkuliahan.nim', '=', 'mahasiswa.nim')
            ->join('matakuliah', 'perkuliahan.kode_mk', '=', 'matakuliah.kode_mk')
            ->where('mahasiswa.nim', $nim)
            ->distinct()
            ->get();
        return response()->json($nilai_mahasiswa);
    }

    /**
     * Update the specified resource in storage.
     */
    // d. Mengupdate nilai (berdasarkan parameter nim dan kode_mk)
    public function update(Request $request, $nim, $kode_mk)
    {
        $request->validate([
            'nilai' => 'required|numeric',
        ]);

        // Cari data Perkuliahan berdasarkan nim dan kode_mk
        $nilai = Perkuliahan::where('nim', $nim)->where('kode_mk', $kode_mk)->first();

        if (!$nilai) {
            return response()->json(['message' => 'Nilai tidak ditemukan'], 404);
        }

        // Update nilai pada data Perkuliahan
        $nilai->nilai = $request->nilai;
        $nilai->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Data Berhasil Terupdate',
        ], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($nim, $kode_mk)
    {
        $nilai = Perkuliahan::where('nim', $nim)->where('kode_mk', $kode_mk)->first();

        if (!$nilai) {
            return response()->json(['message' => 'Nilai tidak ditemukan'], 404);
        }

        $nilai->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Data Berhasil Terhapus',
        ], 200);
    }
}
