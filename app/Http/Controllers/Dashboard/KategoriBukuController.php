<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\BukuKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KategoriBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->search) {
            $dataKategoriBuku = BukuKategori::where('id', 'like', '%' . $request->search . '%')
                ->orWhere('nama_kategori', 'like', '%' . $request->search . '%')
                ->paginate(5);
        }else{
            $dataKategoriBuku = BukuKategori::paginate(10);
        }

        return view('dashboard.manajemen-kategoribuku.index', [
            'dataKategoriBuku' => $dataKategoriBuku
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
        $kategori = $request->all();
        BukuKategori::create($kategori);
        return back()->with(['success' => 'Data berhasil ditambahkan!']);
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
        //
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
        $kategori = BukuKategori::findOrFail($id);
        $kategori->update($request->all());
        return back()->with(['success' => 'Data berhasil diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = BukuKategori::findOrFail($id);
        $kategori->delete();
        return back()->with(['success' => 'Data berhasil dihapus!']);
    }
}
