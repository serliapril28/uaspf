<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use App\Models\Satuan;

class BarangController extends Controller
{
    public function index()
    {
        $pageTitle = 'List Barang';
        // ELOQUENT
        $barang = Barang::with('satuan')->get();

        return view('barang.index', [
            'pageTitle' => $pageTitle,
            'barangs' => $barang
        ]);
    }

    public function create()
    {
        $pageTitle = 'Input Barang';
        // ELOQUENT
        $satuans = Satuan::all();
        return view('barang.create', compact('pageTitle', 'satuans'));
    }
    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Attribute dengan angka',
            'unique' => 'Attribute yang sama sudah tersimpan',
            'exists' => 'Attribute tidak ada pada database'
        ];
        $validator = Validator::make($request->all(), [
            'kode_barang' => 'required|unique:App\Models\Barang,kode_barang',
            'nama_barang' => 'required',
            'harga_barang' => 'required|numeric',
            'deskripsi_barang' => 'required',
            'satuan_barang' => 'required|exists:App\Models\Satuan,kode_satuan'
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // ELOQUENT
        $barang = new Barang;
        $barang->kode_barang = $request->kode_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->harga_barang = $request->harga_barang;
        $barang->deskripsi_barang = $request->deskripsi_barang;
        $barang->satuan_barang = $request->satuan_barang;
        $barang->save();
        return redirect()->route('barang.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show(string $id)
    {
        $pageTitle = 'Detail Barang';
        // ELOQUENT
        $barang = Barang::find($id);
        return view('barang.show', compact('pageTitle', 'barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit(string $id)
    {
        $pageTitle = 'Edit Barang';
        // ELOQUENT
        $satuans = Satuan::all();
        $barang = Barang::find($id);
        return view(
            'barang.edit',
            compact(
                'pageTitle',
                'satuans',
                'barang'
            )
        );
    }
    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Attribute dengan angka',
            'unique' => 'Attribute yang sama sudah tersimpan',
            'exists' => 'Attribute tidak ada pada database'
        ];
        $validator = Validator::make($request->all(), [
            'kode_barang' => 'required|unique:App\Models\Barang,kode_barang',
            'nama_barang' => 'required',
            'harga_barang' => 'required|numeric',
            'deskripsi_barang' => 'required',
            'satuan_barang' => 'required|exists:App\Models\Satuan,kode_satuan'
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // ELOQUENT
        $barang = Barang::find($id);
        $barang->kode_barang = $request->kode_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->harga_barang = $request->harga_barang;
        $barang->deskripsi_barang = $request->deskripsi_barang;
        $barang->satuan_barang = $request->satuan_barang;
        $barang->save();
        return redirect()->route('barang.index');
    }

    public function destroy(string $id)
    {
        // ELOQUENT
        Barang::find($id)->delete();
        return redirect()->route('barang.index');
    }
}
