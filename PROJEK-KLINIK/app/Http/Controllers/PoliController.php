<?php
namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    public function index()
    {
        $poli = Poli::paginate(10);  // Menampilkan data dengan pagination
        return view('poli_index', compact('poli'));
    }

    public function create()
    {
        return view('poli_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'biaya' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
        ]);

        Poli::create($request->all());

        return redirect()->route('poli.index')->with('success', 'Data poli berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $poli = Poli::findOrFail($id);
        return view('poli_edit', compact('poli'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'biaya' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
        ]);

        $poli = Poli::findOrFail($id);
        $poli->update($request->all());

        return redirect()->route('poli.index')->with('success', 'Data poli berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $poli = Poli::findOrFail($id);
        $poli->delete();

        return redirect()->route('poli.index')->with('success', 'Data poli berhasil dihapus.');
    }
}
