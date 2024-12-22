<!DOCTYPE html>
<html lang="en">
<head>
   
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<script>
   document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');
    form.addEventListener('submit', (event) => {
        event.preventDefault(); // Mencegah form submit default

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
                    // Gunakan SweetAlert2 untuk notifikasi sukses
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: data.message,
                        timer: 2000,
                        showConfirmButton: false,
                    });

                    // Reset form atau lakukan tindakan lainnya
                    form.reset();
                } else {
                    // Tampilkan notifikasi error
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
                // Tampilkan notifikasi error
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
        <label class="d-flex align-items-center gap-2">
            <input type="radio" name="payment_method" value="qris" required>
            <img src="/images/qris.png" alt="Qris" style="width: 200px;">
            <div>Qris</div>
        </label>
        
    

<label class="d-flex flex-column gap-1">
    <div class="d-flex align-items-center gap-2">
        <input type="radio" name="payment_method" value="bank_transfer" required id="bank_transfer_option">
        <div>Transfer Bank</div>
    </div>

    <div class="d-flex flex-column gap-3">
    <div class="d-flex align-items-center justify-content-between">
        <div>MANDIRI: <span id="mandiri_account">290111922</span></div>
        <button type="button" class="btn btn-sm btn-outline-primary copy-btn" onclick="copyToClipboard('mandiri_account', this)">
            Copy
        </button>
    </div>
    <div class="d-flex align-items-center justify-content-between ">
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
        <button type="submit" class="btn btn-primary"  >Submit Payment</button>
        
        <a href="{{ route('payments.index') }}" class="btn btn-secondary">Back to Payments</a>
    </form>
</div>
</body>
</html>
