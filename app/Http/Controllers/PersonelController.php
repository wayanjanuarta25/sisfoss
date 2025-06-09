<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personel;
use Illuminate\Support\Facades\Storage;

class PersonelController extends Controller
{
    public function index()
    {
        $personels = Personel::latest()->get();
        return view('personel.index', compact('personels'));
    }

    public function create()
    {
        return view('personel.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'pangkat' => 'required',
            'nrp' => 'required|unique:personels',
            'matra' => 'required',
            'corps' => 'required',
            'tmt_tni' => 'required|date',
            'tmt_jabatan' => 'required|date',
            'jabatan' => 'required',
            'satuan_pelaksana' => 'required',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('fotos', 'public');
        }

        Personel::create($data);
        return redirect()->route('personel.index')->with('success', 'Data personel berhasil ditambahkan.');
    }

    public function edit(Personel $personel)
    {
        return view('personel.edit', compact('personel'));
    }

    public function update(Request $request, Personel $personel)
    {
        $data = $request->validate([
            'nama' => 'required',
            'pangkat' => 'required',
            'nrp' => 'required|unique:personels,nrp,' . $personel->id,
            'matra' => 'required',
            'corps' => 'required',
            'tmt_tni' => 'required|date',
            'tmt_jabatan' => 'required|date',
            'jabatan' => 'required',
            'satuan_pelaksana' => 'required',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($personel->foto) {
                Storage::disk('public')->delete($personel->foto);
            }
            $data['foto'] = $request->file('foto')->store('fotos', 'public');
        }

        $personel->update($data);
        return redirect()->route('personel.index')->with('success', 'Data personel berhasil diperbarui.');
    }

    public function destroy(Personel $personel)
    {
        if ($personel->foto) {
            Storage::disk('public')->delete($personel->foto);
        }
        $personel->delete();
        return redirect()->route('personel.index')->with('success', 'Data personel berhasil dihapus.');
    }
}
