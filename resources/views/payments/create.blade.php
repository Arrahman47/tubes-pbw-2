<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #e0f7fa;
            font-family: 'Arial', sans-serif;
        }
        .container {
            max-width: 600px;
            background-color: #c2def8;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        h2 {
            font-size: 1.8rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }
        .form-label {
            font-weight: 600;
            color: #555;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            font-weight: 600;
            width: 100%;
            padding: 12px;
            font-size: 1rem;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-outline-primary {
            border-color: #007bff;
            color: #007bff;
            font-weight: 600;
        }
        .btn-outline-primary:hover {
            background-color: #007bff;
            color: #ffffff;
        }
        .copy-btn {
            font-weight: 600;
        }
        .form-check-label {
            font-size: 1.1rem;
        }
        .copy-btn {
            padding: 5px 12px;
            border-radius: 5px;
        }
        .payment-option img {
            max-width: 150px;
            margin-right: 15px;
        }
        .payment-option {
            padding: 10px;
            border-radius: 5px;
            background-color: #f1f1f1;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .payment-option div {
            flex: 1;
        }
        .payment-option button {
            flex-shrink: 0;
        }
    </style>
</head>
<body>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');
    form.addEventListener('submit', (event) => {
        event.preventDefault(); // Prevent default form submission

        const formData = new FormData(form);
        const url = form.action;

        fetch(url, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: formData,
        })
            .then(response => response.json())
            .then(data => {
                if (data.message) {
                    // Use SweetAlert2 for success notification
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: data.message,
                        timer: 2000,
                        showConfirmButton: false,
                    });

                    // Redirect to the product create page after success
                    setTimeout(() => {
                        window.location.href = '{{ route("products.create") }}';  // Replace with the actual URL
                    }, 2000);  // Delay redirection by 2 seconds to show success message

                    // Reset the form or perform other actions
                    form.reset();
                } else {
                    // Show error notification
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Something went wrong.',
                        timer: 2000,
                        showConfirmButton: false,
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // Show error notification
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Failed to submit payment.',
                    timer: 2000,
                    showConfirmButton: false,
                });
            });
    });
});

</script>

<script>
    function copyToClipboard(elementId, button) {
        const accountNumber = document.getElementById(elementId).innerText;
        navigator.clipboard.writeText(accountNumber).then(() => {
            // Ubah teks tombol menjadi "Copied ✔️"
            button.innerHTML = 'Copied ✔️';
            button.classList.remove('btn-outline-primary');
            button.classList.add('btn-success');

            // Kembalikan ke "Copy" setelah 2 detik
            setTimeout(() => {
                button.innerHTML = 'Copy';
                button.classList.remove('btn-success');
                button.classList.add('btn-outline-primary');
            }, 2000);
        }).catch(err => {
            console.error('Gagal menyalin', err);
        });
    }
</script>

<div class="container mt-5">
    <h2>Pembayaran</h2>
     <!-- Notice -->
     <div class="p-2 mb-3" style="background-color: rgba(255, 0, 0, 0.1); border: 1px solid rgba(255, 0, 0, 0.3); border-radius: 5px;">
            <p class="text-danger mb-1">
                <i class="fa-solid fa-info-circle me-1"></i>
                1. Diharapkan diisi sesuai data pesanan dengan benar.
            </p>
            <p class="text-danger mb-0">
                <i class="fa-solid fa-info-circle me-1"></i>
                2. Pembayaran harus valid disertai bukti foto pembayaran.
            </p>
        </div>
    <form action="{{ route('payments.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_name" class="form-label">Nama</label>
            <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter your name" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Metode Pembayaran</label>
            <div class="d-flex flex-column gap-3">
                <!-- Qris Option -->
                <label class="d-flex align-items-center gap-2 payment-option">
                    <input type="radio" name="payment_method" value="qris" required>
                    <img src="/images/qris.png" alt="Qris">
                    <div>Qris</div>
                </label>

                <!-- Bank Transfer Option -->
                <label class="d-flex flex-column gap-1">
                    <div class="d-flex align-items-center gap-2">
                        <input type="radio" name="payment_method" value="bank_transfer" required id="bank_transfer_option">
                        <div>Transfer Bank</div>
                    </div>

                    <div class="d-flex flex-column gap-3">
                        <div class="payment-option">
                            <div>MANDIRI: <span id="mandiri_account">290111922</span></div>
                            <button type="button" class="btn btn-sm btn-outline-primary copy-btn" onclick="copyToClipboard('mandiri_account', this)">
                                Copy
                            </button>
                        </div>
                        <div class="payment-option">
                            <div>BCA: <span id="bca_account">942222344</span></div>
                            <button type="button" class="btn btn-sm btn-outline-primary copy-btn" onclick="copyToClipboard('bca_account', this)">
                                Copy
                            </button>
                        </div>
                    </div>
                </label>
            </div>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Jumlah</label>
            <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter amount" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary">Kirim Pembayaran</button>
        
    </form>
</div>

</body>
</html>