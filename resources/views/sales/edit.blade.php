@extends('layout.edit')

@section('content')
    <div class="container">
        <h2>Edit Penjualan</h2>
        <form action="{{ route('sales.update', $sale->SalesID) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="SalesDate">Tanggal Penjualan:</label>
                <input type="date" class="form-control" id="SalesDate" name="SalesDate" value="{{ $sale->SalesDate }}"
                    required>
            </div>
            <div class="form-group">
                <label for="ProductID">Produk:</label>
                <select class="form-control" id="ProductID" name="ProductID" required>
                    @foreach ($products as $product)
                        <option value="{{ $product->ProductID }}"
                            {{ $product->ProductID == $sale->ProductID ? 'selected' : '' }}>{{ $product->ProductName }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="SalesAmount">Jumlah Penjualan:</label>
                <input type="text" class="form-control" id="SalesAmount" name="SalesAmount"
                    value="{{ $sale->SalesAmount }}" required>
            </div>
            <div class="form-group">
                <label for="SalesPersonID">Salesperson:</label>
                <select class="form-control" id="SalesPersonID" name="SalesPersonID" required>
                    @foreach ($salespersons as $salesperson)
                        <option value="{{ $salesperson->SalesPersonID }}"
                            {{ $salesperson->SalesPersonID == $sale->SalesPersonID ? 'selected' : '' }}>
                            {{ $salesperson->SalesPersonName }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
