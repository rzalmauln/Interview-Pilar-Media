<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10); // Misalnya, paginasi 10 record per halaman
        return view('products.index', compact('products'));
    }

    public function create()
    {
        // Tampilkan form untuk membuat data baru
        return view('products.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'ProductName' => 'required|string|max:255',
            // Kolom lain sesuaikan dengan kebutuhan
        ]);

        // Simpan data baru ke dalam database
        Product::create($request->all());

        // Redirect dengan flash message
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show($id)
    {
        // Tampilkan detail data
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        // Tampilkan form untuk mengedit data
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'ProductName' => 'required|string|max:255',
            // Kolom lain sesuaikan dengan kebutuhan
        ]);

        // Update data berdasarkan ID
        $product = Product::findOrFail($id);
        $product->update($request->all());

        // Redirect dengan flash message
        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus data berdasarkan ID
        $product = Product::findOrFail($id);
        $product->delete();

        // Redirect dengan flash message
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
