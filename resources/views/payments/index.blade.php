@extends('layouts.app')

@section('content')
    <title>Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Pembayaran</h2>
   
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Payment Method</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                <tr>
                    <td>{{ $payment->user_name }}</td>
                    <td>{{ ucfirst($payment->payment_method) }}</td>
                    <td>Rp{{ number_format($payment->amount, 2) }}</td>
                    <td>{{ ucfirst($payment->status) }}</td>
                    <td>{{ $payment->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>
    <div class="d-flex justify-content-center">
        

        <!-- Tombol Hapus -->
        <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm me-1">
                <i class="fa-solid fa-trash"></i> Hapus
            </button>
        </form>

        <!-- Tombol Accepted -->
        @if($payment->status_pembayaran !== 'Accepted')
        <form action="{{ route('payments.accept', $payment->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-success btn-sm">
                <i class="fa-solid fa-check"></i> Accepted
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
</div>

<script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/js/all.min.js"></script>
</body>
</html>
@endsection
