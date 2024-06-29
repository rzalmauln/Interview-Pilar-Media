@extends('layout.dashboard')

@section('content')
    <div class="container">
        <h2>Tambah Salesperson Baru</h2>
        <form action="{{ route('salespersons.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="SalesPersonName">Nama Salesperson:</label>
                <input type="text" class="form-control" id="SalesPersonName" name="SalesPersonName" required>
            </div>
            <!-- Add other fields as needed -->
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
