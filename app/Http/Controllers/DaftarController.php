<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Pendaftar;
use App\Models\Lulusan;

class DaftarController extends Controller
{
    public function index()
    {
        return view('pages.main.daftar', [
            'title' => 'Daftar Siswa',
            'programs' => Program::all(),
            'lulusan' => Lulusan::all()
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate(
            [
                'nama' => 'required',
                'nohp' => 'required',
                'nik' => 'required|min:16|max:16|unique:pendaftars,nik',
                'lulusan_id' => 'required',
                'jenis_id' => 'required',
                'alamat' => 'required',
                'tanggal_lahir' => 'required'
            ],
            [
                'nama.required' => 'Nama wajib diisi',
                'nohp.required' => 'Nomor HP wajib diisi',
                'nik.required' => 'NIK wajib diisi',
                'nik.unique' => 'NIK sudah dipakai',
                'nik.min' => 'NIK tidak boleh kurang dari 16 karakter',
                'nik.max' => 'NIK tidak boleh lebih dari 16 karakter',
                'lulusan_id.required' => 'Lulusan wajib diisi',
                'jenis_id.required' => 'Program wajib diisi',
                'alamat.required' => 'Alamat wajib diisi',
                'tanggal_lahir.required' => 'Tanggal Lahir wajib diisi',
            ]
        );
        $data = Pendaftar::create($validateData);
        if ($data) {
            return redirect('/daftar')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Gagal menambah data!');
        }
    }
}
