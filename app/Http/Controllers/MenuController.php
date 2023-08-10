<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Menu;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MenuController extends Controller
{
    public function index(): View
    {  
        $menus = Menu::latest()->paginate(5);
        return view('menus.index', compact('menus'));
    }

    public function create(): View
    {
        $data_barang = Barang::all();
        return view('menus.create', compact('data_barang'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'barang_id' => 'required',
            'harga_menu' => 'required|integer',
        ]);

        $data_barang = Barang::findOrFail($request->barang_id);

        Menu::create([
            'barang_id'  => $request->barang_id,
            'nama_menu'  => $data_barang->nama_barang,
            'harga_menu' => $request->harga_menu,
        ]);

        return redirect()->route('menus.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    public function edit(string $id): View
    {
        $menu = Menu::findOrFail($id);
        return view('menus.edit', compact('menu'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'harga_menu' => 'required|integer',
        ]);

        $menu = Menu::findOrFail($id);

        $menu->update([
            'harga_menu' => $request->harga_menu,
        ]);
        return redirect()->route('menus.index')->with(['success' => 'Data Berhasil Diupdate']);
    }

    public function destroy($id) : RedirectResponse
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return redirect()->route('menus.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
