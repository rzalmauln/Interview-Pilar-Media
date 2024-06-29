@extends('layout.dashboard')

@section('content')
    <div class="container">
        <h2>Edit Produk</h2>
        <form action="{{ route('products.update', $product->ProductID) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="ProductName">Nama Produk:</label>
                <input type="text" class="form-control" id="ProductName" name="ProductName"
                    value="{{ $product->ProductName }}" required>
            </div>
            <!-- Tambahkan input untuk kolom lain sesuai kebutuhan -->
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
