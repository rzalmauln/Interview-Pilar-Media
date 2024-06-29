<?php

namespace App\Http\Controllers;

use App\Models\SalesPerson;
use Illuminate\Http\Request;

class SalesPersonController extends Controller
{
    public function index()
    {
        $salespersons = SalesPerson::paginate(10);
        return view('salespersons.index', compact('salespersons'));
    }

    public function create()
    {
        return view('salespersons.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'SalesPersonName' => 'required|string|max:255',
            // Add validation rules for other fields as needed
        ]);

        SalesPerson::create($request->all());

        return redirect()->route('salespersons.index')
            ->with('success', 'Salesperson created successfully.');
    }

    public function show($id)
    {
        $salesperson = SalesPerson::findOrFail($id);
        return view('salespersons.show', compact('salesperson'));
    }

    public function edit($id)
    {
        $salesperson = SalesPerson::findOrFail($id);
        return view('salespersons.edit', compact('salesperson'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'SalesPersonName' => 'required|string|max:255',
            // Add validation rules for other fields as needed
        ]);

        $salesperson = SalesPerson::findOrFail($id);
        $salesperson->update($request->all());

        return redirect()->route('salespersons.index')
            ->with('success', 'Salesperson updated successfully.');
    }

    public function destroy($id)
    {
        $salesperson = SalesPerson::findOrFail($id);
        $salesperson->delete();

        return redirect()->route('salespersons.index')
            ->with('success', 'Salesperson deleted successfully.');
    }
}
