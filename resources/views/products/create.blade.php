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
        <div id="harga_total" class="form-control bg-light text-dark" readonly>Rp 0</div>
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

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
                        <button type="reset" class="btn btn-secondary btn-sm"><i class="fa-solid fa-eraser"></i> Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
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
