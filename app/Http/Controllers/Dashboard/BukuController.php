<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->search) {
            $dataBuku = Buku::where('id', 'like', '%' . $request->search . '%')
                ->orWhere('nama_buku', 'like', '%' . $request->search . '%')
                ->orWhere('tempat_terbit', 'like', '%' . $request->search . '%')
                ->orWhere('penerbit', 'like', '%' . $request->search . '%')
                ->orWhere('penulis', 'like', '%' . $request->search . '%')
                ->orWhere('tahun_terbit', 'like', '%' . $request->search . '%')
                ->orWhere('editor', 'like', '%' . $request->search . '%')
                ->paginate(10);
        }else{
            $dataBuku = Buku::paginate(10);
        }

        return view('dashboard.manajemen-Buku.index', [
            'dataBuku' => $dataBuku
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
        $buku = $request->all();
        Buku::create($buku);
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
        $buku = Buku::findOrFail($id);
        $buku->update($request->all());
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
        $buku = Buku::findOrFail($id);
        $buku->delete();
        return back()->with(['success' => 'Data berhasil dihapus!']);
    }
}
