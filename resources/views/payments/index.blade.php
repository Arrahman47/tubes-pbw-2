@extends('layouts.app')

@section('content')
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        h2 {
            font-family: 'Roboto', sans-serif;
            font-size: 1.75rem;
        }

        .table {
            margin-top: 20px;
        }

        .btn i {
            margin-right: 5px;
        }
    </style>

<div class="container mt-4">
    <h2 class="text-primary fw-bold">
        <i class="fa-solid fa-credit-card me-2"></i>Manajemen Pembayaran
    </h2>
    <p class="text-muted">Kelola pembayaran pengguna dengan tabel berikut ini.</p>
    @if($payments->isEmpty())  <!-- Corrected variable name here -->
        <div class="alert alert-warning text-center">
            <i class="fa-solid fa-exclamation-circle me-2"></i>Data not found
        </div>
    @else
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-primary text-center">
                <tr>
                    <th>Nama</th>
                    <th>Metode Pembayaran</th>
                    <th>Jumlah</th>
                    <th>Status Pembayaran</th>
                    <th>Created At</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                <tr class="text-center">
                    <td>{{ $payment->user_name }}</td>
                    <td>{{ ucfirst($payment->payment_method) }}</td>
                    <td>Rp{{ number_format($payment->amount, 2) }}</td>
                    <td>{{ ucfirst($payment->status) }}</td>
                    <td>{{ $payment->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <!-- Tombol Hapus -->
                            <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" class="me-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa-solid fa-trash-can"></i> Hapus
                                </button>
                            </form>

                            <!-- Tombol Accepted -->
                            @if($payment->status !== 'Accepted')  <!-- Fixed check for payment status -->
                            <form action="{{ route('payments.accept', $payment->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fa-solid fa-thumbs-up"></i> Accepted
                                </button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection
