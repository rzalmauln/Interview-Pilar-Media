@extends('layout.dashboard')

@section('content')
    <div class="container">
        <h2>Detail Penjualan</h2>
        <table class="table">
            <tr>
                <th>ID Penjualan:</th>
                <td>{{ $sale->SalesID }}</td>
            </tr>
            <tr>
                <th>Tanggal Penjualan:</th>
                <td>{{ $sale->SalesDate }}</td>
            </tr>
            <tr>
                <th>Produk:</th>
                <td>{{ $sale->product->ProductName }}</td>
            </tr>
            <tr>
                <th>Jumlah Penjualan:</th>
                <td>{{ $sale->SalesAmount }}</td>
            </tr>
            <tr>
                <th>Salesperson:</th>
                <td>{{ $sale->SalesPersonID }}</td>
            </tr>
        </table>
        <a href="{{ route('sales.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection
