@extends('layouts.admin')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('alternatif.create') }}" class="btn btn-primary float-right">
                <i class="fas fa-fw fa-plus-circle"></i> Tambah Data
            </a>
            <h5 class="m-0 font-weight-bold text-primary">Alternatif</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="kriteriaTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kosan</th>
                            @foreach ($kriteria as $item)
                                <th>{{ $item->nama }}</th>
                            @endforeach
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($alternatif as $key => $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->kosan->nama }}</td>
                                @foreach ($kriteria as $criterion)
                                    <td>
                                        @switch($criterion->kode)
                                            @case('C1')
                                                @if ($item->C1 == 170)
                                                    170 M
                                                @elseif($item->C1 == 100)
                                                    100 M
                                                @elseif($item->C1 == 250)
                                                    250 M
                                                @elseif($item->C1 == 1000)
                                                    1 Km
                                                @elseif($item->C1 == 1.5)
                                                    1,5 Km
                                                @else
                                                    1,9 Km
                                                @endif
                                            @break

                                            @case('C2')
                                                @if ($item->C2 == 12)
                                                    Rp 12.000.000
                                                @elseif($item->C2 == 14)
                                                    Rp 14.000.000
                                                @elseif($item->C2 == 9.6)
                                                    Rp 9.600.000
                                                @elseif($item->C2 == 6)
                                                    Rp 6.000.000
                                                @elseif($item->C2 == 4.56)
                                                    Rp 4.560.000
                                                @else
                                                    Rp 4.200.000
                                                @endif
                                            @break

                                            @case('C3')
                                                @if ($item->C3 == 1)
                                                    Kamar Mandi Luar dan Fasilitas Kamar Kosong - Sangat Tidak Lengkap
                                                @elseif($item->C3 == '2a')
                                                    Kamar Mandi Dalam, Fasilitas Kamar Kosong - Tidak Lengkap
                                                @elseif($item->C3 == '2b')
                                                    Kasur Dan Kamar Mandi Luar - Kurang Lengkap
                                                @elseif($item->C3 == '3a')
                                                    Kasur, Lemari Dan Kamar Mandi Luar - Cukup Lengkap
                                                @elseif($item->C3 == 6)
                                                    Kasur, Lemari, AC, Wifi, Kamar Mandi Dalam Dan Parkir Luas - Sangat Lengkap
                                                @else
                                                    Kasur, Lemari Dan Kamar Mandi dalam - Cukup
                                                @endif
                                            @break

                                            @case('C4')
                                                @if ($item->C4 == 1)
                                                    Jauh Dengan Tempat Makan dan Tempat Ibadah - Sangat Tidak Lengkap
                                                @elseif($item->C4 == '2a')
                                                    Dekat Dengan Tempat Makan Dan Tempat Ibadah Jauh - Tidak Lengkap
                                                @elseif($item->C4 == '2b')
                                                    Dekat Tempat Ibadah Dan Tempat Makan Jauh - Kurang Lengkap
                                                @elseif($item->C4 == '2c')
                                                    Dekat Denag Tempat Makan Dan Tempat Ibadah - Cukup Lengkap
                                                @elseif($item->C4 == 4)
                                                    Dekat Denag Tempat Makan Warung, Tempat Ibadah Dan Cafe - Sangat Lengkap
                                                @else
                                                    Dekat Denag Tempat Makan, Warung Dan Tempat Ibadah - Cukup
                                                @endif
                                            @break

                                            @case('C6')
                                                @if ($item->C5 == 3)
                                                    1.5x2
                                                @elseif($item->C5 == 4)
                                                    2x2
                                                @elseif($item->C5 == 6)
                                                    2x3
                                                @elseif($item->C5 == 7.5)
                                                    2.5x3
                                                @elseif($item->C5 == 9)
                                                    3x3
                                                @else
                                                    3.5x3
                                                @endif
                                            @break

                                            @case('C5')
                                                @if ($item->C6 == '1a')
                                                    Tidak Ada Keamanan
                                                @elseif($item->C6 == '1b')
                                                    Penjaga Kosan
                                                @elseif($item->C6 == '1c')
                                                    Satpam
                                                @elseif($item->C6 == '2a')
                                                    CCTV Dan Penjaga Kosan
                                                @elseif($item->C6 == '2b')
                                                    CCTV Dan Satpam
                                                @else
                                                    CCTV, Satpam Dan Penjaga Kosan
                                                @endif
                                            @break

                                            @case('C7')
                                                @if ($item->C7 == 20)
                                                    Jam 20:00 Wib
                                                @elseif($item->C7 == 19)
                                                    Jam 19:00 Wib
                                                @elseif($item->C7 == 21)
                                                    Jam 21:00 Wib
                                                @elseif($item->C7 == 22)
                                                    Jam 22:00 Wib
                                                @elseif($item->C7 == 23)
                                                    Jam 23:00 Wib
                                                @else
                                                    Tidak Di Batasi Waktu
                                                @endif
                                            @break

                                            @case('C8')
                                                @if ($item->C8 == 1)
                                                    Pascabayar/Token Listrik
                                                @else
                                                    Pascabayar/Bulanan
                                                @endif
                                            @break

                                            @case('C9')
                                                @if ($item->C9 == 10)
                                                    Dibersihkan Setiap Hari
                                                @elseif($item->C9 == 8)
                                                    Dibersihkan Seminggu Sekali
                                                @elseif($item->C9 == 6)
                                                    Dibersihkan Tiga Minggu Sekali
                                                @elseif($item->C9 == 4)
                                                    Dibersihkan Sebulan Sekali
                                                @elseif($item->C9 == 2)
                                                    Dibersihkan Dua Bulan Sekali
                                                @else
                                                    Dibersihkan Tiga Bulan Sekali
                                                @endif
                                            @break
                                        @endswitch
                                    </td>
                                @endforeach

                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('alternatif.edit', $item->id) }}"
                                            class="btn bg-gradient-success btn-sm text-white">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </a>
                                        <form action="{{ route('alternatif.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this item?');">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn bg-gradient-danger btn-sm text-white">
                                                <i class="fas fa-fw fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

@section('after-script')
    <script>
        window.addEventListener('DOMContentLoaded', event => {


            const kriteriaTable = document.getElementById('kriteriaTable');
            if (kriteriaTable) {
                new simpleDatatables.DataTable(kriteriaTable);
            }


        });
    </script>
@endsection
