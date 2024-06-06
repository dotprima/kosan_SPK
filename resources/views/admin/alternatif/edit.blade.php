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
                        <label>Nama Kost</label>
                        <input type="text" class="form-control" name="nama" value="{{ $alternatif->nama }}" required>
                    </div>
                    <div class="form-group">
                        <label>Jarak ke Kampus (km)</label>
                        <select class="form-control" name="C1" required>
                            <option value="1" {{ $alternatif->C1 == 1 ? 'selected' : '' }}>
                                <= 0.05 km </option>
                            <option value="2" {{ $alternatif->C1 == 2 ? 'selected' : '' }}> > 0.05 - 0.25 km </option>
                            <option value="3" {{ $alternatif->C1 == 3 ? 'selected' : '' }}> > 0.25 - 1 km </option>
                            <option value="4" {{ $alternatif->C1 == 4 ? 'selected' : '' }}> > 1 - 2.5 km </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga Sewa (Rp)</label>
                        <select class="form-control" name="C2" required>
                            <option value="1" {{ $alternatif->C2 == 1 ? 'selected' : '' }}>
                                <= Rp 700,000 - Rp 900,000 </option>
                            <option value="2" {{ $alternatif->C2 == 2 ? 'selected' : '' }}> > Rp 900,000 - Rp 1,300,000
                            </option>
                            <option value="3" {{ $alternatif->C2 == 3 ? 'selected' : '' }}> > Rp 1,300,000 - Rp
                                1,600,000 </option>
                            <option value="4" {{ $alternatif->C2 == 4 ? 'selected' : '' }}> > Rp 1,600,000 - Rp
                                2,000,000 </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Fasilitas</label>
                        <select class="form-control" name="C3" required>
                            <option value="1" {{ $alternatif->C3 == 1 ? 'selected' : '' }}>Kasur, Lemari - Sangat
                                tidak lengkap</option>
                            <option value="2" {{ $alternatif->C3 == 2 ? 'selected' : '' }}>Kasur, Lemari, Kipas -
                                Tidak Lengkap</option>
                            <option value="3" {{ $alternatif->C3 == 3 ? 'selected' : '' }}>Kasur, Lemari, Kipas/AC &
                                kamar mandi dalam - Cukup Lengkap</option>
                            <option value="4" {{ $alternatif->C3 == 4 ? 'selected' : '' }}>Kasur, Lemari, Kipas/AC,
                                kamar mandi dalam, Wifi & parkir Luas - Lengkap</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Lokasi Pendukung</label>
                        <select class="form-control" name="C4" required>
                            <option value="1" {{ $alternatif->C4 == 1 ? 'selected' : '' }}>Dekat dengan tempat hiburan
                                - Sangat tidak lengkap</option>
                            <option value="2" {{ $alternatif->C4 == 2 ? 'selected' : '' }}>Dekat dengan tempat makan
                                dan tempat hiburan - Tidak Lengkap</option>
                            <option value="3" {{ $alternatif->C4 == 3 ? 'selected' : '' }}>Dekat dengan tempat makan,
                                tempat ibadah dan tempat hiburan - Cukup Lengkap</option>
                            <option value="4" {{ $alternatif->C4 == 4 ? 'selected' : '' }}>Dekat dengan tempat makan,
                                warung, tempat ibadah dan tempat hiburan - Lengkap</option>
                        </select>
                    </div>
                    <!-- Previous form elements -->

                    <div class="form-group">
                        <label>Level Keamanan (1-10)</label>
                        <select class="form-control" name="C5" required>
                            <option value="1" {{ $alternatif->C5 == 1 ? 'selected' : '' }}>Tidak ada keamanan</option>
                            <option value="2" {{ $alternatif->C5 == 2 ? 'selected' : '' }}>Satpam atau penjaga
                            </option>
                            <option value="3" {{ $alternatif->C5 == 3 ? 'selected' : '' }}>CCTV</option>
                            <option value="4" {{ $alternatif->C5 == 4 ? 'selected' : '' }}>CCTV dan satpam atau
                                penjaga</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Luas Kamar (m²)</label>
                        <select class="form-control" name="C6" required>
                            <option value="1" {{ $alternatif->C6 == 1 ? 'selected' : '' }}>3x3</option>
                            <option value="2" {{ $alternatif->C6 == 2 ? 'selected' : '' }}>3x4</option>
                            <option value="3" {{ $alternatif->C6 == 3 ? 'selected' : '' }}>4x5</option>
                            <option value="4" {{ $alternatif->C6 == 4 ? 'selected' : '' }}>5x6</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Batas Jam Malam</label>
                        <select class="form-control" name="C7" required>
                            <option value="1" {{ $alternatif->C7 == 1 ? 'selected' : '' }}>21:00-22:00</option>
                            <option value="2" {{ $alternatif->C7 == 2 ? 'selected' : '' }}>23:00-24:00</option>
                            <option value="3" {{ $alternatif->C7 == 3 ? 'selected' : '' }}>01:00-02:00</option>
                            <option value="4" {{ $alternatif->C7 == 4 ? 'selected' : '' }}>Tidak ada batas jam malam
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jenis Listrik</label>
                        <select class="form-control" name="C8" required>
                            <option value="3" {{ $alternatif->C8 == 'postpaid' ? 'selected' : '' }}>Pascabayar/bulanan
                            </option>
                            <option value="3" {{ $alternatif->C8 == 'prepaid' ? 'selected' : '' }}>Prabayar/token
                                listrik</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kebersihan Kos(1-10)</label>
                        <select class="form-control" name="C9" required>
                            <option value="2" {{ $alternatif->C9 == 2 ? 'selected' : '' }}>Di Bersihkan Setiap Hari
                            </option>
                            <option value="3" {{ $alternatif->C9 == 3 ? 'selected' : '' }}>Di Bersihkan Setiap Minggu
                            </option>
                            <option value="5" {{ $alternatif->C9 == 5 ? 'selected' : '' }}>Di Bersihkan Setiap Bulan
                            </option>
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
