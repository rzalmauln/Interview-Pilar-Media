@extends('layout.dashboard')

@section('content')
    <div class="container">
        <h2>Detail Produk</h2>
        <table class="table">
            <tr>
                <th>Nama Produk:</th>
                <td>{{ $product->ProductName }}</td>
            </tr>
            <!-- Tampilkan kolom lain sesuai kebutuhan -->
        </table>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection
