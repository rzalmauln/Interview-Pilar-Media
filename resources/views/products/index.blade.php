@extends('layout.dashboard')

@section('content')
    <div class="container">
        <h2>Data Produk</h2>
        <p>
            <a href="{{ route('products.create') }}" class="btn btn-success">Tambah Produk</a>
        </p>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Produk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->ProductName }}</td>
                        <td>
                            <a href="{{ route('products.show', $product->ProductID) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('products.edit', $product->ProductID) }}"
                                class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('products.destroy', $product->ProductID) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
@endsection
