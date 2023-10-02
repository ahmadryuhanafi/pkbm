<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lulusan;

class LulusanController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.master.lulusan.index', [
            'title' => 'Data Lulusan',
            'data' => Lulusan::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.master.lulusan.create', [
            'title' => 'Tambah program'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        // validasi data yang diinputkan dari form
        $validateData = $request->validate([
            'nama' => 'required|unique:lulusans,nama',
            'deskripsi' => 'nullable'
        ]);


        // jika data sudah didapat semua, proses update dilakukan.
        $data = Lulusan::create($validateData);

        // pesan yang dikirim jika berhasil atau gagal
        if ($data) {
            return redirect('/lulusan')->with('success', 'Data lulusan berhasil ditambah');
        } else {
            return redirect()->back()->with('error', 'Gagal menambah data!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.dashboard.master.lulusan.edit', [
            'title' => 'Edit Lulusan',
            'lulusan' => Lulusan::find($id)
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
        $validateData = $request->validate([
            'nama' => 'required|unique:lulusans,nama,' . $id,
            'deskripsi' => 'nullable'
        ]);

        // jika data sudah didapat semua, proses update dilakukan.
        $data = Lulusan::findorFail($id);
        $data->update($validateData);

        // pesan yang dikirim jika berhasil atau gagal
        if ($data) {
            return redirect('/lulusan')->with('success', 'Data lulusan berhasil diupdate');
        } else {
            return redirect()->back()->with('error', 'Gagal update data!');
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
        Lulusan::findOrFail($id)->delete();
        // pesan jika berhasil hapus
        return redirect()->back()->with('success', 'Data lulusan berhasil dihapus');
    }
}
