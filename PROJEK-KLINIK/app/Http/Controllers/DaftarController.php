<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Models\Pasien;
use App\Models\Poli;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    // Menampilkan halaman index (daftar pasien)
    public function index()
    {
        $daftar = Daftar::with(['pasien', 'poli'])->paginate(10); // Menggunakan eager loading
        return view('daftar_index', compact('daftar'));
    }

    // Menampilkan halaman create (form tambah pendaftaran)
    public function create()
    {
        $pasien = Pasien::all(); // Mengambil semua data pasien
        $poli = Poli::all(); // Mengambil semua data poli
        return view('daftar_create', compact('pasien', 'poli'));
    }

    // Menyimpan data pendaftaran pasien baru
    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'poli_id' => 'required|exists:polis,id',
            'keluhan' => 'required|string|max:255',
            'tanggal_daftar' => 'required|date',
        ]);

        Daftar::create($request->all());

        return redirect()->route('daftar.index')->with('success', 'Pendaftaran pasien berhasil ditambahkan.');
    }

    public function show($id)
{
    // Ambil data pendaftaran dari model Daftar berdasarkan ID
    $daftar = Daftar::findOrFail($id);

    // Ambil data pasien terkait
    $pasien = Pasien::findOrFail($daftar->pasien_id);

    // Ambil data poli terkait
    $poli = Poli::findOrFail($daftar->poli_id);

    // Kirim data ke view daftar_show
    return view('daftar_show', compact('daftar', 'pasien', 'poli'));
}


    // Menampilkan halaman edit pendaftaran
    public function edit($id)
    {
        $daftar = Daftar::findOrFail($id); // Ambil data berdasarkan ID
        $pasien = Pasien::all(); // Ambil semua data pasien
        $poli = Poli::all(); // Ambil semua data poli
        return view('daftar.edit', compact('daftar', 'pasien', 'poli'));
    }

    // Mengupdate data pendaftaran
    public function update(Request $request, $id)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'poli_id' => 'required|exists:polis,id',
            'keluhan' => 'required|string|max:255',
            'tanggal_daftar' => 'required|date',
        ]);

        $daftar = Daftar::findOrFail($id);
        $daftar->update($request->all());

        return redirect()->route('daftar.index')->with('success', 'Pendaftaran pasien berhasil diperbarui.');
    }

    public function updateDiagnosis(Request $request, $id)
{
    $daftar = Daftar::findOrFail($id);

    // Validasi input
    $validated = $request->validate([
        'diagnosis' => 'required|string|max:255',
        'tindakan'  => 'required|string|max:255',
    ]);

    // Update data diagnosis dan tindakan
    $daftar->update([
        'diagnosis' => $validated['diagnosis'],
        'tindakan'  => $validated['tindakan'],
    ]);

    // Redirect ke halaman daftar_show dengan pesan sukses
    return redirect()->route('daftar.show', $id)->with('success', 'Hasil diagnosis berhasil disimpan!');
}


    // Menghapus data pendaftaran
    public function destroy($id)
    {
        $daftar = Daftar::findOrFail($id);
        $daftar->delete();

        return redirect()->route('daftar.index')->with('success', 'Pendaftaran pasien berhasil dihapus.');
    }
}
