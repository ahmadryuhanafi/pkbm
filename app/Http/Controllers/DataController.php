<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use App\Models\Program;
use App\Models\Lulusan;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.dashboard.pendaftar.index', [
            'title' => 'Data Pendaftar PKBM Lestari',
            'datas' => Pendaftar::latest()->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.dashboard.pendaftar.edit', [
            'title' => 'Edit Data Pendaftar',
            'pendaftar' => Pendaftar::findOrFail($id),
            'programs' => Program::all(),
            'lulusan' => Lulusan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validasi data yang diinputkan dari form
        $validateData = $request->validate(
            [
                'nama' => 'required',
                'nohp' => 'required',
                'nik' => 'required|min:16|max:16|unique:pendaftars,nik,' . $id,
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


        // jika data sudah didapat semua, proses update dilakukan.
        $data = Pendaftar::where('id', $id)->update($validateData);

        // pesan yang dikirim jika berhasil atau gagal
        if ($data) {
            return redirect('/data')->with('success', 'Data pendaftar berhasil diubah');
        } else {
            return redirect()->back()->with('error', 'Gagal mengubah data!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // untuk menghapus data
        Pendaftar::find($id)->delete();
        // pesan jika berhasil hapus
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
