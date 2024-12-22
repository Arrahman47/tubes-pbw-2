@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm mt-4">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="fa-solid fa-plus-circle"></i> Tambah Pemesanan</h4>
                <a href="{{ route('products.index') }}" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Ada beberapa masalah pada input Anda:<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                

                <form action="{{ route('products.store') }}" method="POST">
                    @csrf
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama"><strong>Nama</strong></label>
                                <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama" value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                    <div class="row g-3">
                        <!-- Tanggal Pemesanan -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_pemesanan"><strong>Tanggal Pemesanan</strong></label>
                                <input type="date" name="tanggal_pemesanan" class="form-control @error('tanggal_pemesanan') is-invalid @enderror" placeholder="Tanggal Pemesanan" value="{{ old('tanggal_pemesanan') }}">
                                @error('tanggal_pemesanan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Pilihan Kategori -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pilihan_kategori"><strong>Pilihan Kategori</strong></label>
                                <select id="pilihan_kategori" name="pilihan_kategori" class="form-control">
    <option value="" disabled selected>Pilih kategori</option>
    <option value="Komplit" data-harga="6000">Komplit (Rp 6000/kg)</option>
    <option value="Cuci Kering" data-harga="4000">Cuci Kering (Rp 4000/kg)</option>
    <option value="Setrika" data-harga="4000">Setrika (Rp 4000/kg)</option>
</select>

                                @error('pilihan_kategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Gedung Asrama -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gedung_asrama"><strong>Gedung Asrama</strong></label>
                                <input type="text" id="gedung_asrama" name="gedung_asrama" class="form-control @error('gedung_asrama') is-invalid @enderror" placeholder="Gedung Asrama" value="{{ old('gedung_asrama') }}">
                                @error('gedung_asrama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Jumlah (kg) -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jumlah_kg"><strong>Jumlah (kg)</strong></label>
                                <input 
                                    type="number" 
                                    id="jumlah_kg" 
                                    name="jumlah_kg" 
                                    class="form-control @error('jumlah_kg') is-invalid @enderror" 
                                    placeholder="Jumlah (kg)" 
                                    value="{{ old('jumlah_kg') }}" 
                                    min="1" 
                                    oninput="hitungHarga()" 
                                    required
                                >
                                <div class="mb-3">
        <label for="harga_total" class="form-label">Total Harga</label>
        <div id="harga_total" class="form-control bg-light text-dark" readonly>Rp</div>
    </div>
</div>
                                @error('jumlah_kg')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- No Kamar -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_kamar"><strong>No Kamar</strong></label>
                                <input type="number" id="no_kamar" name="no_kamar" class="form-control @error('no_kamar') is-invalid @enderror" placeholder="No Kamar" value="{{ old('no_kamar') }}">
                                @error('no_kamar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                    <div class="col-md-6">
                    <div class="form-group">
    <label for="bukti_pembayaran"><strong>Foto Bukti Pembayaran</strong></label>
    <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" class="form-control" accept="image/*" onchange="previewBuktiPembayaran(event)">
    <img id="bukti_preview" src="#" alt="Preview Bukti Pembayaran" class="img-fluid" style="display:none;">

</div>
<a href="{{ route('payments.create') }}" class="btn btn-success mb-3" id="pay-button">Bayar</a>

                        <!-- Status Pembayaran -->
                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="status_pembayaran"><strong>Status Pembayaran</strong></label>
                                <select name="status_pembayaran" id="status_pembayaran" class="form-select @error('status_pembayaran') is-invalid @enderror">
                                    <option value="" disabled selected>Pilih status</option>
                                    <option value="Belum Dibayar" {{ old('status_pembayaran') == 'Belum Dibayar' ? 'selected' : '' }}>Belum Dibayar</option>
                                    <option value="Sudah Dibayar" {{ old('status_pembayaran') == 'Sudah Dibayar' ? 'selected' : '' }}>Sudah Dibayar</option>
                                </select>
                                @error('status_pembayaran')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> -->

                        <!-- Catatan -->
                        <div class="col-12">
                            <div class="form-group">
                                <label for="catatan"><strong>Catatan</strong></label>
                                <textarea class="form-control @error('catatan') is-invalid @enderror" name="catatan" placeholder="Catatan">{{ old('catatan') }}</textarea>
                                @error('catatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
                    <button type="reset" class="btn btn-secondary btn-sm"><i class="fa-solid fa-eraser"></i> Reset</button>


                 <!-- <div class="text-center mt-4">
                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#reviewModal">
        <i class="fa-solid fa-eye"></i> Review Pemesanan
    </button>
                       

<div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reviewModalLabel">Review Pemesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Nama:</strong> <span id="review_nama"></span></p>
                <p><strong>Tanggal Pemesanan:</strong> <span id="review_tanggal_pemesanan"></span></p>
                <p><strong>Kategori:</strong> <span id="review_kategori"></span></p>
                <p><strong>Gedung Asrama:</strong> <span id="review_gedung_asrama"></span></p>
                <p><strong>Jumlah (kg):</strong> <span id="review_jumlah_kg"></span></p>
                <p><strong>Total Harga:</strong> <span id="review_total_harga"></span></p>
                <p><strong>No Kamar:</strong> <span id="review_no_kamar"></span></p>
                <p><strong>Catatan:</strong> <span id="review_catatan"></span></p>
                <p><strong>Foto Bukti Pembayaran:</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="document.querySelector('form').submit();">Kirim Pemesanan</button>
            </div>
        </div>
    </div>
</div> -->

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')



    <script>
       function previewBuktiPembayaran(event) {
    const file = event.target.files[0];
    const reader = new FileReader();
    const preview = document.getElementById('bukti_preview');

    reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
        updateReview();
    };

    if (file) {
        reader.readAsDataURL(file);
    }
}

function updateReview() {
    document.getElementById('review_nama').textContent = document.getElementById('nama').value;
    document.getElementById('review_tanggal_pemesanan').textContent = document.getElementById('tanggal_pemesanan').value;
    document.getElementById('review_kategori').textContent = document.getElementById('pilihan_kategori').value;
    document.getElementById('review_gedung_asrama').textContent = document.getElementById('gedung_asrama').value;
    document.getElementById('review_jumlah_kg').textContent = document.getElementById('jumlah_kg').value;
    document.getElementById('review_total_harga').textContent = document.getElementById('harga_total').textContent;
    document.getElementById('review_no_kamar').textContent = document.getElementById('no_kamar').value;
    document.getElementById('review_catatan').textContent = document.getElementById('catatan').value;

    // Update preview of the uploaded payment receipt
    const previewImage = document.getElementById('bukti_preview');
    document.getElementById('review_bukti').src = previewImage.src;
}

// Event listener untuk memonitor setiap perubahan di form
document.addEventListener('DOMContentLoaded', () => {
    const formElements = document.querySelectorAll('input, select, textarea');
    formElements.forEach(element => {
        element.addEventListener('input', updateReview);
    });
});
function updateReview() {
    document.getElementById('review_nama').textContent = document.getElementById('nama').value;
    document.getElementById('review_tanggal_pemesanan').textContent = document.getElementById('tanggal_pemesanan').value;
    document.getElementById('review_kategori').textContent = document.getElementById('pilihan_kategori').value;
    document.getElementById('review_gedung_asrama').textContent = document.getElementById('gedung_asrama').value;
    document.getElementById('review_jumlah_kg').textContent = document.getElementById('jumlah_kg').value;
    document.getElementById('review_total_harga').textContent = document.getElementById('harga_total').textContent;
    document.getElementById('review_no_kamar').textContent = document.getElementById('no_kamar').value;
    document.getElementById('review_catatan').textContent = document.getElementById('catatan').value;

    // Update preview of the uploaded payment receipt
    const previewImage = document.getElementById('bukti_preview');
    document.getElementById('review_bukti').src = previewImage.src;

    // Show the modal
    const modal = new bootstrap.Modal(document.getElementById('reviewModal'));
    modal.show();
}

       function hitungHarga() {
    const kategoriSelect = document.getElementById('pilihan_kategori');
    const jumlahKgInput = document.getElementById('jumlah_kg');
    const hargaTotalDiv = document.getElementById('harga_total');

    // Ambil data harga dari kategori yang dipilih
    const selectedOption = kategoriSelect.options[kategoriSelect.selectedIndex];
    const hargaPerKg = selectedOption ? parseInt(selectedOption.getAttribute('data-harga')) : 0;

    // Ambil jumlah (kg)
    const jumlahKg = parseInt(jumlahKgInput.value) || 0;

    // Hitung total harga
    const totalHarga = hargaPerKg * jumlahKg;

    // Tampilkan hasil ke elemen harga total
    hargaTotalDiv.textContent = totalHarga.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
}
    document.addEventListener('DOMContentLoaded', () => {
        const kategoriSelect = document.getElementById('pilihan_kategori');
        const jumlahKgInput = document.getElementById('jumlah_kg');

        kategoriSelect.addEventListener('change', hitungHarga);
        jumlahKgInput.addEventListener('input', hitungHarga);
    });


    </script>
@endsection
