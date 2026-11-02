<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Menampilkan katalog barang dan kategori untuk pengunjung (Guest).
     */
    public function index(Request $request)
    {
        $categories = Category::orderBy('nama_kategori')->get();

        $query = Item::with('category')->latest();

        // Filter berdasarkan kategori yang dipilih pengunjung
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Pencarian berdasarkan nama barang atau kategori
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_barang', 'like', "%{$search}%")
                    ->orWhere('kode_barang', 'like', "%{$search}%")
                    ->orWhereHas('category', function ($catQuery) use ($search) {
                        $catQuery->where('nama_kategori', 'like', "%{$search}%");
                    });
            });
        }

        $items = $query->paginate(8)->withQueryString();

        return view('guest.index', compact('items', 'categories'));
    }
}
