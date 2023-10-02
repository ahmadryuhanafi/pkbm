<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.dashboard.master.program.index', [
            'title' => 'Data Program',
            'programs' => Program::latest()->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.master.program.create', [
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
        // validasi data yang diinputkan dari form
        $validateData = $request->validate([
            'jenis' => 'required|unique:programs'
        ]);


        // jika data sudah didapat semua, proses update dilakukan.
        $data = Program::create($validateData);

        // pesan yang dikirim jika berhasil atau gagal
        if ($data) {
            return redirect('/program')->with('success', 'Data program berhasil ditambah');
        } else {
            return redirect()->back()->with('error', 'Gagal menambah data!');
        }
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
        return view('pages.dashboard.master.program.edit', [
            'title' => 'Edit Program',
            'program' => Program::find($id)
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
            'jenis' => 'required|unique:programs,jenis,' . $id
        ]);

        // jika data sudah didapat semua, proses update dilakukan.
        $data = Program::findorFail($id);
        $data->update($validateData);

        // pesan yang dikirim jika berhasil atau gagal
        if ($data) {
            return redirect('/program')->with('success', 'Data program berhasil diupdate');
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
        Program::findOrFail($id)->delete();
        // pesan jika berhasil hapus
        return redirect()->back()->with('success', 'Data lulusan berhasil dihapus');
    }
}
