<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
class ItemController extends Controller
{
    public function index()
    {
        $items = Item::latest()->get();

        return view('admin.items.index', compact('items'));
    }

    public function create()
    {
        return view('admin.items.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_barang' => 'required|unique:items,kode_barang',
            'nama_barang' => 'required',
            'kategori' => 'required',
            'stok' => 'required|integer|min:0',
            'satuan' => 'required',
            'lokasi' => 'nullable|string',
            'deskripsi' => 'nullable|string',
        ]);

        Item::create($validated);

        return redirect()
            ->route('items.index')
            ->with('success', 'Barang berhasil ditambahkan.');
    }

    public function show(Item $item)
    {
        return view('admin.items.show', compact('item'));
    }

    public function edit(Item $item)
    {
        return view('admin.items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'kode_barang' => 'required|unique:items,kode_barang,' . $item->id,
            'nama_barang' => 'required',
            'kategori' => 'required',
            'stok' => 'required|integer|min:0',
            'satuan' => 'required',
            'lokasi' => 'nullable|string',
            'deskripsi' => 'nullable|string',
        ]);

        $item->update($validated);

        return redirect()
            ->route('items.index')
            ->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()
            ->route('items.index')
            ->with('success', 'Barang berhasil dihapus.');
    }
}
