<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::paginate(2);
        $lastId = Barang::orderBy('id_barang', 'desc')->first()?->id_barang ?? 'B-000';
        $nextNumber = (int)substr($lastId, 2) + 1;
        $nextId = 'B-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
        
        return view('dashboard.manajemen.barang', compact('barangs', 'nextId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|unique:barangs,id_barang',
            'nama_barang' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        Barang::create([
            'id_barang' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_barang' => 'required|unique:barangs,id_barang,'.$id.',id_barang',
            'nama_barang' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        $barang = Barang::where('id_barang', $id)->first();
        $barang->update([
            'id_barang' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil diperbarui');
    }

    public function destroy($id)
    {
        Barang::where('id_barang', $id)->delete();
        return redirect()->route('barang.index')->with('success', 'Data barang berhasil dihapus');
    }

    public function edit($id)
    {
        try {
            $barang = Barang::where('id_barang', $id)->first();
            
            if (!$barang) {
                return response()->json(['error' => 'Data tidak ditemukan'], 404);
            }
            
            return response()->json($barang);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }
}
