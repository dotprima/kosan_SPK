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
                            @foreach($kosans as $kosan)
                                <option value="{{ $kosan->id }}">
                                    {{ $kosan->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jarak ke Kampus (km)</label>
                        <select class="form-control" name="C1" required>
                            <option value="1">
                                <= 0.05 km </option>
                            <option value="2"> > 0.05 - 0.25 km </option>
                            <option value="3"> > 0.25 - 1 km </option>
                            <option value="4"> > 1 - 2.5 km </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga Sewa (Rp)</label>
                        <select class="form-control" name="C2" required>
                            <option value="1">
                                <= Rp 700,000 - Rp 900,000 </option>
                            <option value="2"> > Rp 900,000 - Rp 1,300,000 </option>
                            <option value="3"> > Rp 1,300,000 - Rp 1,600,000 </option>
                            <option value="4"> > Rp 1,600,000 - Rp 2,000,000 </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Fasilitas</label>
                        <select class="form-control" name="C3" required>
                            <option value="1">Kasur, Lemari - Sangat tidak lengkap</option>
                            <option value="2">Kasur, Lemari, Kipas - Tidak Lengkap</option>
                            <option value="3">Kasur, Lemari, Kipas/AC & kamar mandi dalam - Cukup Lengkap</option>
                            <option value="4">Kasur, Lemari, Kipas/AC, kamar mandi dalam, Wifi & parkir Luas - Lengkap
                            </option>
                        </select>
                    </div>

                  

                    <div class="form-group">
                        <label>Lokasi Pendukung</label>
                        <select class="form-control" name="C4" required>
                            <option value="1">Dekat dengan tempat hiburan - Sangat tidak lengkap</option>
                            <option value="2">Dekat dengan tempat makan dan tempat hiburan - Tidak Lengkap</option>
                            <option value="3">Dekat dengan tempat makan, tempat ibadah dan tempat hiburan - Cukup
                                Lengkap</option>
                            <option value="4">Dekat dengan tempat makan, warung, tempat ibadah dan tempat hiburan -
                                Lengkap</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Level Keamanan (1-10)</label>
                        <select class="form-control" name="C6" required>
                            <option value="1">Tidak ada keamanan</option>
                            <option value="2">Satpam atau penjaga</option>
                            <option value="3">CCTV</option>
                            <option value="4">CCTV dan satpam atau penjaga</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Luas Kamar (m²)</label>
                        <select class="form-control" name="C5" required>
                            <option value="1">3x3</option>
                            <option value="2">3x4</option>
                            <option value="3">4x5</option>
                            <option value="4">5x6</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Batas Jam Malam</label>
                        <select class="form-control" name="C7" required>
                            <option value="1">21:00-22:00</option>
                            <option value="2">23:00-24:00</option>
                            <option value="3">01:00-02:00</option>
                            <option value="4">Tidak ada batas jam malam</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jenis Listrik</label>
                        <select class="form-control" name="C8" required>
                            <option value="3">Pascabayar/bulanan</option>
                            <option value="3">Prabayar/token listrik</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kebersihan Kos(1-10)</label>
                        <select class="form-control" name="C9" required>
                            <option value="2">Di Bersihkan Setiap Hari</option>
                            <option value="3">Di Bersihkan Setiap Minggu</option>
                            <option value="5">Di Bersihkan Setiap Bulan</option>
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
