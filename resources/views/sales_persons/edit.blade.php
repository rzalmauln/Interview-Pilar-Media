@extends('layout.blade.php')

@section('content')
    <div class="container">
        <h2>Edit Salesperson</h2>
        <form action="{{ route('salespersons.update', $salesperson->SalesPersonID) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="SalesPersonName">Nama Salesperson:</label>
                <input type="text" class="form-control" id="SalesPersonName" name="SalesPersonName"
                    value="{{ $salesperson->SalesPersonName }}" required>
            </div>
            <!-- Add other fields as needed -->
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
