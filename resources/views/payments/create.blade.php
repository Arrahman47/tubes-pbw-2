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
    <form action="{{ route('payments.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_name" class="form-label">Nama</label>
            <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter your name" required>
        </div>
        <div class="mb-3">
            <label for="payment_method" class="form-label">Metode Pembayaran</label>
            <select name="payment_method" id="payment_method" class="form-control" required>
                <option value="" disabled selected>Pilih Metode Pembayaran</option>
                <option value="qris">Qris</option>
                <option value="bank_transfer">Transfer Bank</option>
               
            </select>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Jumlah</label>
            <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter amount" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit Payment</button>
        <a href="{{ route('payments.index') }}" class="btn btn-secondary">Back to Payments</a>
    </form>
</div>
</body>
</html>
