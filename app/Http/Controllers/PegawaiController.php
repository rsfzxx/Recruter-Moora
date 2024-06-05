<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::paginate(10);
        return view('pegawais.index', compact('pegawais'));
    }

    public function create()
    {
        return view('pegawais.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|max:20|unique:pegawais,nik',
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki Laki,Perempuan',
            'status_perkawinan' => 'required|in:Sudah Menikah,Belum Menikah', 
            'pengalaman_kerja' => 'required|in:-1,2,3,4,5,5+',
            'ipk' => 'required|numeric|min:0|max:4',
            'usia' => 'required|integer|min:18',
            'nilai_psikotest' => 'required|integer|min:0|max:100',
            'nilai_tes_tertulis' => 'required|integer|min:0|max:100',
            'nilai_wawancara' => 'required|integer|min:0|max:100',
        ]);

        Pegawai::create($request->all());

        return redirect()->route('pegawais.index')
                         ->with('success', 'Pegawai berhasil dibuat.');
    }

    public function show(Pegawai $pegawai)
    {
        return view('pegawais.show', compact('pegawai'));
    }

    public function edit(Pegawai $pegawai)
    {
        return view('pegawais.edit', compact('pegawai'));
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'nik' => 'required|string|max:20|unique:pegawais,nik,' . $pegawai->id,
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki Laki,Perempuan',
            'status_perkawinan' => 'required|in:Sudah Menikah,Belum Menikah',
            'pengalaman_kerja' => 'required|in:-1,2,3,4,5,5+',
            'ipk' => 'required|numeric|min:0|max:4',
            'usia' => 'required|integer|min:18',
            'nilai_psikotest' => 'required|integer|min:0|max:100',
            'nilai_tes_tertulis' => 'required|integer|min:0|max:100',
            'nilai_wawancara' => 'required|integer|min:0|max:100',
        ]);

        $pegawai->update($request->all());

        return redirect()->route('pegawais.index')
                         ->with('success', 'Pegawai updated successfully.');
    }

    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();

        return redirect()->route('pegawais.index')
                         ->with('success', 'Pegawai deleted successfully.');
    }
}
