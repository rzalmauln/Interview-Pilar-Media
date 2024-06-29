<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\SalesPerson;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sale::paginate(10);
        // dd($sales); // Misalnya, paginasi 10 record per halaman
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        // Tampilkan form untuk membuat data baru
        return view('sales.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'SalesDate' => 'required|date',
            'ProductID' => 'required|exists:products,id',
            'SalesAmount' => 'required|numeric',
            'SalesPersonID' => 'required|exists:salespersons,id',
        ]);

        // Simpan data baru ke dalam database
        Sale::create($request->all());

        // Redirect dengan flash message
        return redirect()->route('sales.index')->with('success', 'Data penjualan berhasil ditambahkan.');
    }

    public function show($id)
    {
        // Tampilkan detail data
        $sale = Sale::findOrFail($id);
        return view('sales.show', compact('sale'));
    }

    public function edit($id)
    {
        // Tampilkan form untuk mengedit data
        $sale = Sale::findOrFail($id);
        $products = Product::all();
        $salespersons = SalesPerson::all();
        return view('sales.edit', compact('sale', 'products', 'salespersons'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'SalesDate' => 'required|date',
            'ProductID' => 'required|exists:products,id',
            'SalesAmount' => 'required|numeric',
            'SalesPersonID' => 'required|exists:salespersons,id',
        ]);

        // Update data berdasarkan ID
        $sales = Sale::findOrFail($id);
        $sales->update($request->all());

        // Redirect dengan flash message
        return redirect()->route('sales.index')->with('success', 'Data penjualan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus data berdasarkan ID
        $sales = Sale::findOrFail($id);
        $sales->delete();

        // Redirect dengan flash message
        return redirect()->route('sales.index')->with('success', 'Data penjualan berhasil dihapus.');
    }
}
