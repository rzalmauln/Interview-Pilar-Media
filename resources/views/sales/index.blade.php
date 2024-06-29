@extends('layout.dashboard')

@section('content')
    <div class="container">
        <h2>Data Penjualan</h2>
        <p>
            <a href="{{ route('sales.create') }}" class="btn btn-success">Tambah Data</a>
        </p>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tanggal</th>
                    <th>Produk</th>
                    <th>Jumlah Penjualan</th>
                    <th>Penjual</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $sale->SalesDate }}</td>
                        <td>{{ $sale->product->ProductName }}</td>
                        <td>{{ $sale->SalesAmount }}</td>
                        <td>{{ $sale->SalesPersonID }}</td>
                        <td>
                            <a href="{{ route('sales.show', $sale->SalesID) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('sales.edit', $sale->SalesID) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('sales.destroy', $sale->SalesID) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $sales->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
@endsection
