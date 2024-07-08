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
                <h6 class="m-0 font-weight-bold text-primary">Edit Alternatif</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('alternatif.update', $alternatif->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama Kosan</label>
                        <select class="form-control" name="kosan_id" required>
                            @foreach ($kosans as $kosan)
                                <option value="{{ $kosan->id }}"
                                    {{ $alternatif->kosan_id == $kosan->id ? 'selected' : '' }}>
                                    {{ $kosan->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jarak ke Kampus (km)</label>
                        <select class="form-control" name="C1" required>
                            <option value="170" {{ $alternatif->C1 == 170 ? 'selected' : '' }}>170 M</option>
                            <option value="100" {{ $alternatif->C1 == 100 ? 'selected' : '' }}>100 M</option>
                            <option value="250" {{ $alternatif->C1 == 250 ? 'selected' : '' }}>250 M</option>
                            <option value="1000" {{ $alternatif->C1 == 1000 ? 'selected' : '' }}>1 Km</option>
                            <option value="1.5" {{ $alternatif->C1 == 1500 ? 'selected' : '' }}>1,5 Km</option>
                            <option value="1.9" {{ $alternatif->C1 == 1900 ? 'selected' : '' }}>1,9 Km</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Harga Sewa (Rp)</label>
                        <select class="form-control" name="C2" required>
                            <option value="12" {{ $alternatif->C2 == 12 ? 'selected' : '' }}>Rp 12.000.000</option>
                            <option value="14" {{ $alternatif->C2 == 14 ? 'selected' : '' }}>Rp 14.000.000</option>
                            <option value="9.6" {{ $alternatif->C2 == 9.6 ? 'selected' : '' }}>Rp 9.600.000</option>
                            <option value="6" {{ $alternatif->C2 == 6 ? 'selected' : '' }}>Rp 6.000.000</option>
                            <option value="4.56" {{ $alternatif->C2 == 4.56 ? 'selected' : '' }}>Rp 4.560.000</option>
                            <option value="4.2" {{ $alternatif->C2 == 4.2 ? 'selected' : '' }}>Rp 4.200.000</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Fasilitas</label>
                        <select class="form-control" name="C3" required>
                            <option value="1" {{ $alternatif->C3 == 1 ? 'selected' : '' }}>Kamar Mandi Luar dan
                                Fasilitas Kamar Kosong - Sangat Tidak Lengkap</option>
                            <option value="2a" {{ $alternatif->C3 == '2a' ? 'selected' : '' }}>Kamar Mandi Dalam,
                                Fasilitas Kamar Kosong - Tidak Lengkap</option>
                            <option value="2b" {{ $alternatif->C3 == '2b' ? 'selected' : '' }}>Kasur Dan Kamar Mandi
                                Luar - Kurang Lengkap</option>
                            <option value="3a" {{ $alternatif->C3 == '3a' ? 'selected' : '' }}>Kasur, Lemari Dan Kamar
                                Mandi Luar - Cukup Lengkap</option>
                            <option value="6" {{ $alternatif->C3 == 6 ? 'selected' : '' }}>Kasur, Lemari, AC, Wifi,
                                Kamar Mandi Dalam Dan Parkir Luas - Sangat Lengkap</option>
                            <option value="3b" {{ $alternatif->C3 == '3b' ? 'selected' : '' }}>Kasur, Lemari Dan Kamar
                                Mandi dalam - Cukup</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Lokasi Pendukung</label>
                        <select class="form-control" name="C4" required>
                            <option value="1" {{ $alternatif->C4 == 1 ? 'selected' : '' }}>Jauh Dengan Tempat Makan
                                dan Tempat Ibadah - Sangat Tidak Lengkap</option>
                            <option value="2a" {{ $alternatif->C4 == '2a' ? 'selected' : '' }}>Dekat Dengan Tempat
                                Makan Dan Tempat Ibadah Jauh - Tidak Lengkap</option>
                            <option value="2b" {{ $alternatif->C4 == '2b' ? 'selected' : '' }}>Dekat Tempat Ibadah Dan
                                Tempat Makan Jauh - Kurang Lengkap</option>
                            <option value="2c" {{ $alternatif->C4 == '2c' ? 'selected' : '' }}>Dekat Denag Tempat Makan
                                Dan Tempat Ibadah - Cukup Lengkap</option>
                            <option value="4" {{ $alternatif->C4 == 4 ? 'selected' : '' }}>Dekat Denag Tempat Makan
                                Warung, Tempat Ibadah Dan Cafe - Sangat Lengkap</option>
                            <option value="3" {{ $alternatif->C4 == 3 ? 'selected' : '' }}>Dekat Denag Tempat Makan,
                                Warung Dan Tempat Ibadah - Cukup</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Level Keamanan (1-10)</label>
                        <select class="form-control" name="C5" required>
                            <option value="1a" {{ $alternatif->C5 == '1a' ? 'selected' : '' }}>Tidak Ada Keamanan
                            </option>
                            <option value="1b" {{ $alternatif->C5 == '1b' ? 'selected' : '' }}>Penjaga Kosan</option>
                            <option value="1c" {{ $alternatif->C5 == '1c' ? 'selected' : '' }}>Satpam</option>
                            <option value="2a" {{ $alternatif->C5 == '2a' ? 'selected' : '' }}>CCTV Dan Penjaga Kosan
                            </option>
                            <option value="2b" {{ $alternatif->C5 == '2b' ? 'selected' : '' }}>CCTV Dan Satpam</option>
                            <option value="3" {{ $alternatif->C5 == 3 ? 'selected' : '' }}>CCTV, Satpam Dan Penjaga
                                Kosan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Luas Kamar (m²)</label>
                        <select class="form-control" name="C6" required>
                            <option value="3" {{ $alternatif->C6 == 3 ? 'selected' : '' }}>1.5x2</option>
                            <option value="4" {{ $alternatif->C6 == 4 ? 'selected' : '' }}>2x2</option>
                            <option value="6" {{ $alternatif->C6 == 6 ? 'selected' : '' }}>2x3</option>
                            <option value="7.5" {{ $alternatif->C6 == 7.5 ? 'selected' : '' }}>2.5x3</option>
                            <option value="9" {{ $alternatif->C6 == 9 ? 'selected' : '' }}>3x3</option>
                            <option value="10.5" {{ $alternatif->C6 == 10.5 ? 'selected' : '' }}>3.5x3</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Batas Jam Malam</label>
                        <select class="form-control" name="C7" required>
                            <option value="20" {{ $alternatif->C7 == 20 ? 'selected' : '' }}>Jam 20:00 Wib</option>
                            <option value="19" {{ $alternatif->C7 == 19 ? 'selected' : '' }}>Jam 19:00 Wib</option>
                            <option value="21" {{ $alternatif->C7 == 21 ? 'selected' : '' }}>Jam 21:00 Wib</option>
                            <option value="22" {{ $alternatif->C7 == 22 ? 'selected' : '' }}>Jam 22:00 Wib</option>
                            <option value="23" {{ $alternatif->C7 == 23 ? 'selected' : '' }}>Jam 23:00 Wib</option>
                            <option value="24" {{ $alternatif->C7 == 24 ? 'selected' : '' }}>Tidak Di Batasi Waktu
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Jenis Listrik</label>
                        <select class="form-control" name="C8" required>
                            <option value="1" {{ $alternatif->C8 == 1 ? 'selected' : '' }}>Pascabayar/Token Listrik
                            </option>
                            <option value="2" {{ $alternatif->C8 == 2 ? 'selected' : '' }}>Pascabayar/Bulanan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Kebersihan Kos (1-10)</label>
                        <select class="form-control" name="C9" required>
                            <option value="10" {{ $alternatif->C9 == 10 ? 'selected' : '' }}>Dibersihkan Setiap Hari
                            </option>
                            <option value="8" {{ $alternatif->C9 == 8 ? 'selected' : '' }}>Dibersihkan Seminggu Sekali
                            </option>
                            <option value="6" {{ $alternatif->C9 == 6 ? 'selected' : '' }}>Dibersihkan Tiga Minggu
                                Sekali</option>
                            <option value="4" {{ $alternatif->C9 == 4 ? 'selected' : '' }}>Dibersihkan Sebulan Sekali
                            </option>
                            <option value="2" {{ $alternatif->C9 == 2 ? 'selected' : '' }}>Dibersihkan Dua Bulan
                                Sekali</option>
                            <option value="1" {{ $alternatif->C9 == 1 ? 'selected' : '' }}>Dibersihkan Tiga Bulan
                                Sekali</option>
                        </select>
                    </div>



                    <div class="form-group">
                        <button class="btn btn-primary btn-block">Update Data</button>
                    </div>


                </form>
            </div>
        </div>
    </div>

@endsection
