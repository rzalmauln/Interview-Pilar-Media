@extends('layout.dashboard')

@section('content')
    <div class="container">
        <h2>Detail Salesperson</h2>
        <table class="table">
            <tr>
                <th>ID Salesperson:</th>
                <td>{{ $salesperson->SalesPersonID }}</td>
            </tr>
            <tr>
                <th>Nama Salesperson:</th>
                <td>{{ $salesperson->SalesPersonName }}</td>
            </tr>
            <!-- Add other fields as needed -->
        </table>
        <a href="{{ route('salespersons.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection
