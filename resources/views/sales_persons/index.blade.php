@extends('layout.dashboard')

@section('content')
    <div class="container">
        <h2>Daftar Salesperson</h2>
        <a href="{{ route('salespersons.create') }}" class="btn btn-success mb-3">Tambah Salesperson Baru</a>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($salespersons as $salesperson)
                    <tr>
                        <td>{{ $salesperson->SalesPersonID }}</td>
                        <td>{{ $salesperson->SalesPersonName }}</td>
                        <td>
                            <form action="{{ route('salespersons.destroy', $salesperson->SalesPersonID) }}" method="POST">
                                <a href="{{ route('salespersons.show', $salesperson->SalesPersonID) }}"
                                    class="btn btn-info">Lihat</a>
                                <a href="{{ route('salespersons.edit', $salesperson->SalesPersonID) }}"
                                    class="btn btn-primary">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus salesperson ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $salesperson->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
@endsection
