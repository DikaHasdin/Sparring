<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaketController extends Controller
{
    public function index(): View
    {  
        $pakets = Paket::latest()->paginate(5);
        return view('pakets.index', compact('pakets'));
    }

    public function create(): View
    {
        return view('pakets.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'nama_paket' => 'required',
            'jumlah_jam' => 'required|integer',
            'harga_paket' => 'required|integer',
        ]);

        Paket::create([
            'nama_paket'  => $request->nama_paket,
            'jumlah_jam'  => $request->jumlah_jam,
            'harga_paket' => $request->harga_paket,
        ]);

        return redirect()->route('pakets.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    public function edit(string $id): View
    {
        $paket = Paket::findOrFail($id);
        return view('pakets.edit', compact('paket'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'nama_paket' => 'required',
            'jumlah_jam' => 'required|integer',
            'harga_paket' => 'required|integer',
        ]);

        $paket = Paket::findOrFail($id);

        $paket->update([
            'nama_paket'  => $request->nama_paket,
            'jumlah_jam'  => $request->jumlah_jam,
            'harga_paket' => $request->harga_paket,
        ]);
        return redirect()->route('pakets.index')->with(['success' => 'Data Berhasil Diupdate']);
    }

    public function destroy($id) : RedirectResponse
    {
        $paket = Paket::findOrFail($id);
        $paket->delete();
        return redirect()->route('pakets.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
