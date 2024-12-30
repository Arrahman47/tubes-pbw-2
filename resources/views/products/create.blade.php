@extends('layouts.app')
@section('content')
<script>
    function previewImage(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('preview');

        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };

            reader.readAsDataURL(file);
        } else {
            preview.src = '';
            preview.style.display = 'none';
        }
    }

    function hitungHarga() {
        const kategori = document.getElementById('pilihan_kategori');
        const jumlahKg = document.getElementById('jumlah_kg');
        const hargaTotal = document.getElementById('harga_total');

        const selectedOption = kategori.options[kategori.selectedIndex];
        const hargaPerKg = selectedOption ? parseInt(selectedOption.getAttribute('data-harga')) : 0;

        const jumlah = parseInt(jumlahKg.value) || 0;
        const total = hargaPerKg * jumlah;

        hargaTotal.value = `Rp ${total.toLocaleString('id-ID')}`;
    }

    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('pilihan_kategori').addEventListener('change', hitungHarga);
        document.getElementById('jumlah_kg').addEventListener('input', hitungHarga);
    });
</script>

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

                <div class="p-2 mb-3" style="background-color: rgba(255, 0, 0, 0.1); border: 1px solid rgba(255, 0, 0, 0.3); border-radius: 5px;">
    <p class="text-danger mb-1">
        <i class="fa-solid fa-info-circle me-1"></i>
        1. Diharapkan diisi sesuai data pesanan dengan benar.
    </p>
    <p class="text-danger mb-1">
        <i class="fa-solid fa-info-circle me-1"></i>
        2. Bagian kolom catatan beri tanda strip "-" apabila tidak mengisi.
    </p>
    <p class="text-danger mb-0">
        <i class="fa-solid fa-info-circle me-1"></i>
        3. Foto Bukti Pembayaran harus terlihat jelas, tidak blur, dan tidak palsu.
    </p>
</div>


                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama"><strong>Nama</strong></label>
                                <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama" value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_pemesanan"><strong>Tanggal Pemesanan</strong></label>
                                <input type="date" name="tanggal_pemesanan" class="form-control @error('tanggal_pemesanan') is-invalid @enderror" value="{{ old('tanggal_pemesanan') }}">
                                @error('tanggal_pemesanan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

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

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gedung_asrama"><strong>Gedung Asrama</strong></label>
                                <input type="text" id="gedung_asrama" name="gedung_asrama" class="form-control @error('gedung_asrama') is-invalid @enderror" placeholder="Gedung Asrama" value="{{ old('gedung_asrama') }}">
                                @error('gedung_asrama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jumlah_kg"><strong>Jumlah (kg)</strong></label>
                                <input type="number" id="jumlah_kg" name="jumlah_kg" class="form-control @error('jumlah_kg') is-invalid @enderror" placeholder="Jumlah (kg)" value="{{ old('jumlah_kg') }}" min="1" required>
                                <div class="mt-2">
                                    <label for="harga_total" class="form-label">Total Harga</label>
                                    <input type="text" id="harga_total" class="form-control bg-light text-dark" readonly value="Rp 0">
                                </div>
                                @error('jumlah_kg')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

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
                                <label for="bukti_pembayaran"><b>Foto Bukti Pembayaran</b></label>
                                <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran" accept="image/jpeg,image/png,application/pdf" onchange="previewImage(event)">
                                <img id="preview" src="" alt="Preview Bukti Pembayaran" style="display: none; margin-top: 10px; max-width: 100%; height: auto; border: 1px solid #ddd; padding: 5px;">
                            </div>
                            <a href="{{ route('payments.create') }}" class="btn btn-success mb-3" id="pay-button">Bayar</a>

                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="catatan"><strong>Catatan *jika kosong harap beri tanda "-"</strong></label>
                                <textarea class="form-control @error('catatan') is-invalid @enderror" name="catatan" placeholder="Catatan">{{ old('catatan') }}</textarea>
                                @error('catatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
                    <button type="reset" class="btn btn-secondary btn-sm"><i class="fa-solid fa-eraser"></i> Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
