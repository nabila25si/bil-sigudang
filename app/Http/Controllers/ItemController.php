<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('category')->latest()->get();

        return view('admin.items.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::orderBy('nama_kategori')->get();

        return view('admin.items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_barang' => 'required|unique:items,kode_barang',
            'nama_barang' => 'required',
            'category_id' => 'required|exists:categories,id',
            'stok' => 'required|integer|min:0',
            'satuan' => 'required',
            'lokasi' => 'nullable|string',
            'deskripsi' => 'nullable|string',
        ]);

        $category = Category::findOrFail($request->category_id);
        $validated['kategori'] = $category->nama_kategori;

        Item::create($validated);

        return redirect()
            ->route('items.index')
            ->with('success', 'Barang berhasil ditambahkan.');
    }

    public function show(Item $item)
    {
        $item->load('category');

        return view('admin.items.show', compact('item'));
    }

    public function edit(Item $item)
    {
        $categories = Category::orderBy('nama_kategori')->get();

        return view('admin.items.edit', compact('item', 'categories'));
    }

    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'kode_barang' => 'required|unique:items,kode_barang,' . $item->id,
            'nama_barang' => 'required',
            'category_id' => 'required|exists:categories,id',
            'stok' => 'required|integer|min:0',
            'satuan' => 'required',
            'lokasi' => 'nullable|string',
            'deskripsi' => 'nullable|string',
        ]);

        $category = Category::findOrFail($request->category_id);
        $validated['kategori'] = $category->nama_kategori;

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
