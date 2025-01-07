<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Pasien;
use Carbon\Carbon;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mendapatkan data pasien dengan pagination dan menghitung umur berdasarkan tanggal lahir
        $data['pasien'] = Pasien::latest()->paginate(6);
        foreach ($data['pasien'] as $pasien) {
            $pasien->umur = Carbon::parse($pasien->umur)->age; // Menghitung umur berdasarkan tanggal lahir
        }
        return view('pasien_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pasien_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'nama' => 'required|min:3',
            'no_bpjs' => 'required',
            'umur' => 'required|date', // Validasi untuk tanggal lahir
            'jenis_kelamin' => 'required',
            'alamat' => 'nullable',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:1000',
        ]);
    
        $pasien = new Pasien;
        $pasien->fill($requestData);
        $pasien->foto = $request->file('foto')->store('public');
        $pasien->save();
        flash('Data berhasil disimpan')->success();
        return back();
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
    public function edit(string $id)
    {
        $data['pasien'] = Pasien::findOrFail($id);
        return view('pasien_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'no_bpjs' => 'required|unique:pasiens,no_bpjs,' . $id,
            'nama' => 'required|min:3',
            'umur' => 'required|date', // Menggunakan 'date' untuk tanggal lahir
            'jenis_kelamin' => 'required',
            'alamat' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:1000',
        ]);

        $pasien = Pasien::findOrFail($id);
        $pasien->fill($requestData);

        // Jika ada foto baru, hapus yang lama dan simpan yang baru
        if ($request->hasfile('foto')) {
            Storage::delete($pasien->foto);
            $pasien->foto = $request->file('foto')->store('public');
        }
        
        $pasien->save();

        flash('Data berhasil diubah')->success();
        return redirect('/pasien');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pasien = Pasien::findOrFail($id);

        if ($pasien->daftar->count() >= 1) {
            flash('Data tidak bisa dihapus karena terkait data pendaftaran')->error();
            return back();
        }

        if ($pasien->foto != null && Storage::exists($pasien->foto)) {
            Storage::delete($pasien->foto);
        }
        $pasien->delete();

        flash('Data berhasil dihapus');
        return back();
    }
}
