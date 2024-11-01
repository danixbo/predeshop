<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::paginate(2);
        $lastId = Pelanggan::orderBy('id_pelanggan', 'desc')->first()?->id_pelanggan ?? 'P-000';
        $nextNumber = (int)substr($lastId, 2) + 1;
        $nextId = 'P-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
        
        return view('dashboard.manajemen.pelanggan', compact('pelanggans', 'nextId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        Pelanggan::create([
            'id_pelanggan' => $request->id_pelanggan,
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);

        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        $pelanggan = Pelanggan::where('id_pelanggan', $id)->first();
        $pelanggan->update([
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);

        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil diperbarui');
    }

    public function destroy($id)
    {
        Pelanggan::where('id_pelanggan', $id)->delete();
        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil dihapus');
    }

    public function edit($id)
    {
        try {
            $pelanggan = Pelanggan::where('id_pelanggan', $id)->first();
            
            if (!$pelanggan) {
                return response()->json(['error' => 'Data tidak ditemukan'], 404);
            }
            
            return response()->json($pelanggan);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }
}
