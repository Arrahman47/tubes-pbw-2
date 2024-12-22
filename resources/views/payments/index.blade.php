<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>




<div class="container mt-5">
    <h2>Pembayaran</h2>
   
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
                <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm me-1">
            <i class="fa-solid fa-trash"></i> Hapus
        </button>
    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
