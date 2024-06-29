@extends('layout.dashboard')

@section('content')
    <div class="container">
        <h2>Tambah Produk Baru</h2>
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="ProductName">Nama Produk:</label>
                <input type="text" class="form-control" id="ProductName" name="ProductName" required>
            </div>
            <!-- Tambahkan input untuk kolom lain sesuai kebutuhan -->
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
