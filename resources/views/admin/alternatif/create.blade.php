@extends('layouts.admin')
@section('content')

    @if (count($errors) > 0)
        @foreach ($errors as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success') }}
        </div>
    @endif

    <div class="col-lg-12 order-lg-1">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Alternatif</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('alternatif.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nama Kosan</label>
                        <select class="form-control" name="kosan_id" required>
                            @foreach ($kosans as $kosan)
                                <option value="{{ $kosan->id }}">
                                    {{ $kosan->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jarak ke Kampus (km)</label>
                        <select class="form-control" name="C1" required>
                            <option value="170">170 M</option>
                            <option value="100">100 M</option>
                            <option value="250">250 M</option>
                            <option value="1000">1 Km</option>
                            <option value="1500">1,5 Km</option>
                            <option value="1900">1,9 Km</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Harga Sewa (Rp)</label>
                        <select class="form-control" name="C2" required>
                            <option value="12">Rp 12.000.000</option>
                            <option value="14">Rp 14.000.000</option>
                            <option value="9.6">Rp 9.600.000</option>
                            <option value="6">Rp 6.000.000</option>
                            <option value="4.56">Rp 4.560.000</option>
                            <option value="4.2">Rp 4.200.000</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Fasilitas</label>
                        <select class="form-control" name="C3" required>
                            <option value="1">Kamar Mandi Luar dan Fasilitas Kamar Kosong - Sangat Tidak Lengkap
                            </option>
                            <option value="2a">Kamar Mandi Dalam, Fasilitas Kamar Kosong - Tidak Lengkap</option>
                            <option value="2b">Kasur Dan Kamar Mandi Luar - Kurang Lengkap</option>
                            <option value="3a">Kasur, Lemari Dan Kamar Mandi Luar - Cukup Lengkap</option>
                            <option value="6">Kasur, Lemari, AC, Wifi, Kamar Mandi Dalam Dan Parkir Luas - Sangat
                                Lengkap</option>
                            <option value="3b">Kasur, Lemari Dan Kamar Mandi dalam - Cukup</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Lokasi Pendukung</label>
                        <select class="form-control" name="C4" required>
                            <option value="1">Jauh Dengan Tempat Makan dan Tempat Ibadah - Sangat Tidak Lengkap
                            </option>
                            <option value="2a">Dekat Dengan Tempat Makan Dan Tempat Ibadah Jauh - Tidak Lengkap</option>
                            <option value="2b">Dekat Tempat Ibadah Dan Tempat Makan Jauh - Kurang Lengkap</option>
                            <option value="2c">Dekat Denag Tempat Makan Dan Tempat Ibadah - Cukup Lengkap</option>
                            <option value="4">Dekat Denag Tempat Makan Warung, Tempat Ibadah Dan Cafe - Sangat Lengkap
                            </option>
                            <option value="3">Dekat Denag Tempat Makan, Warung Dan Tempat Ibadah - Cukup</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Level Keamanan (1-10)</label>
                        <select class="form-control" name="C5" required>
                            <option value="1a">Tidak Ada Keamanan</option>
                            <option value="1b">Penjaga Kosan</option>
                            <option value="1c">Satpam</option>
                            <option value="2a">CCTV Dan Penjaga Kosan</option>
                            <option value="2b">CCTV Dan Satpam</option>
                            <option value="3">CCTV, Satpam Dan Penjaga Kosan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Luas Kamar (m²)</label>
                        <select class="form-control" name="C6" required>
                            <option value="3">1.5x2</option>
                            <option value="4">2x2</option>
                            <option value="6">2x3</option>
                            <option value="7.5">2.5x3</option>
                            <option value="9">3x3</option>
                            <option value="10.5">3.5x3</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Batas Jam Malam</label>
                        <select class="form-control" name="C7" required>
                            <option value="20">Jam 20:00 Wib</option>
                            <option value="19">Jam 19:00 Wib</option>
                            <option value="21">Jam 21:00 Wib</option>
                            <option value="22">Jam 22:00 Wib</option>
                            <option value="23">Jam 23:00 Wib</option>
                            <option value="24">Tidak Di Batasi Waktu</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Jenis Listrik</label>
                        <select class="form-control" name="C8" required>
                            <option value="1">Pascabayar/Token Listrik</option>
                            <option value="2">Pascabayar/Bulanan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Kebersihan Kos (1-10)</label>
                        <select class="form-control" name="C9" required>
                            <option value="10">Dibersihkan Setiap Hari</option>
                            <option value="8">Dibersihkan Seminggu Sekali</option>
                            <option value="6">Dibersihkan Tiga Minggu Sekali</option>
                            <option value="4">Dibersihkan Sebulan Sekali</option>
                            <option value="2">Dibersihkan Dua Bulan Sekali</option>
                            <option value="1">Dibersihkan Tiga Bulan Sekali</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-block">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
