<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merchandise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MerchandiseController extends Controller
{
    public function index()
    {
        $search = request('search');

        // Query Data Produk (Pencarian)
        $merchandises = Merchandise::when($search, function($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")->orWhere('sku', 'like', "%{$search}%");
        })
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        // Statistik Dasar (Dinamis)
        $totalProducts = Merchandise::where('stock', '<', 10) ->count();
        $lowStock = Merchandise::where('stock', '<', 10)->count();
        $monthlySales = Merchandise::count();

        return view('admin.merchandise.index', compact(
            'merchandises',
            'totalProducts',
            'lowStock',
            'monthlySales',
            'search'
        ));
    }

    // Show
    public function show(Merchandise $merchandise)
    {
        return view('admin.merchandise.show', compact('merchandise'));
    }

    // Create
    public function create()
    {
        $categories = ['Apparel', 'Accessories', 'Toys', 'Stationery', 'Collectibles'];
        return view('admin.merchandise.create', compact('categories'));
    }

    // Store
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|unique:merchandises,sku',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        // Upload gambar
        if ($request->hasFile('image')) {
            $imageName = uniqid() . '.' . $request->image->extension();
            $validated['image'] = $request->image->storeAs('merchandise', $imageName, 'public');
        }

        Merchandise::create($validated);

        return redirect()->route('admin.merchandise.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    // Edit
    public function edit(Merchandise $merchandise)
    {
        $categories = ['Apparel', 'Accessories', 'Toys', 'Stationery', 'Collectibles'];
        return view('admin.merchandise.edit', compact('merchandise', 'categories'));
    }

    // Update
    public function update(Request $request, Merchandise $merchandise)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|unique:merchandises,sku,' . $merchandise->id,
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        // Jika upload gambar baru
        if ($request->hasFile('image')) {

            // Hapus gambar lama
            if ($merchandise->image && Storage::disk('public')->exists($merchandise->image)) {
                Storage::disk('public')->delete($merchandise->image);
            }

            $imageName = uniqid() . '.' . $request->image->extension();
            $validated['image'] = $request->image->storeAs('merchandise', $imageName, 'public');
        }

        $merchandise->update($validated);

        return redirect()->route('admin.merchandise.index')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    // Delete
    public function destroy(Merchandise $merchandise)
    {
        if ($merchandise->image && Storage::disk('public')->exists($merchandise->image)) {
            Storage::disk('public')->delete($merchandise->image);
        }

        $merchandise->delete();

        return redirect()->route('admin.merchandise.index')
            ->with('success', 'Produk berhasil dihapus!');
    }
}
