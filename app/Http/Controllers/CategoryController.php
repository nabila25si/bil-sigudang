<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories using Query Builder with leftJoin and search.
     */
    public function index(Request $request)
    {
        // CRUD 2: Query Builder dengan leftJoin ke tabel items dan filter where / nested where
        $query = DB::table('categories')
            ->select('categories.id', 'categories.nama_kategori', 'categories.deskripsi', 'categories.created_at')
            ->selectRaw('COUNT(items.id) as total_items')
            ->leftJoin('items', 'items.category_id', '=', 'categories.id')
            ->groupBy('categories.id', 'categories.nama_kategori', 'categories.deskripsi', 'categories.created_at');

        // Eksplorasi where dan nested where sesuai fokus tugas dosen
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('categories.nama_kategori', 'like', "%{$search}%")
                    ->orWhere('categories.deskripsi', 'like', "%{$search}%");
            });
        }

        $categories = $query->orderBy('categories.nama_kategori', 'asc')->paginate(10)->withQueryString();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created category using Query Builder.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        DB::table('categories')->insert([
            'nama_kategori' => $validated['nama_kategori'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified category using Query Builder.
     */
    public function edit($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();

        abort_if(! $category, 404);

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified category using Query Builder.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $category = DB::table('categories')->where('id', $id)->first();
        abort_if(! $category, 404);

        DB::table('categories')->where('id', $id)->update([
            'nama_kategori' => $validated['nama_kategori'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'updated_at' => now(),
        ]);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified category using Query Builder.
     */
    public function destroy($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        abort_if(! $category, 404);

        DB::table('categories')->where('id', $id)->delete();

        return redirect()
            ->route('categories.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
