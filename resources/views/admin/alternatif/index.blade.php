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
                                                @if ($item->C1 == 1)
                                                <= 0.05 km @elseif($item->C1 == 2)> 0.05 - 0.25 km
                                                    @elseif($item->C1 == 3)
                                                        > 0.25 - 1 km
                                                    @else
                                                        > 1 - 2.5 km
                                                @endif
                                            @break

                                            @case('C2')
                                                @if ($item->C2 == 1)
                                                <= Rp 700,000 - Rp 900,000 @elseif($item->C2 == 2)> Rp 900,000 - Rp
                                                        1,300,000
                                                    @elseif($item->C2 == 3)
                                                        > Rp 1,300,000 - Rp 1,600,000
                                                    @else
                                                        > Rp 1,600,000 - Rp 2,000,000
                                                @endif
                                            @break

                                            @case('C3')
                                                @if ($item->C3 == 1)
                                                    Kasur, Lemari - Sangat tidak lengkap
                                                @elseif($item->C3 == 2)
                                                    Kasur, Lemari, Kipas - Tidak Lengkap
                                                @elseif($item->C3 == 3)
                                                    Kasur, Lemari, Kipas/AC & kamar mandi dalam - Cukup Lengkap
                                                @else
                                                    Kasur, Lemari, Kipas/AC, kamar mandi dalam, Wifi & parkir Luas - Lengkap
                                                @endif
                                            @break

                                            @case('C4')
                                                @if ($item->C4 == 1)
                                                    Dekat dengan tempat hiburan - Sangat tidak lengkap
                                                @elseif($item->C4 == 2)
                                                    Dekat dengan tempat makan dan tempat hiburan - Tidak Lengkap
                                                @elseif($item->C4 == 3)
                                                    Dekat dengan tempat makan, tempat ibadah dan tempat hiburan - Cukup Lengkap
                                                @else
                                                    Dekat dengan tempat makan, warung, tempat ibadah dan tempat hiburan - Lengkap
                                                @endif
                                            @break

                                            @case('C5')
                                                @if ($item->C5 == 1)
                                                    3x3
                                                @elseif($item->C5 == 2)
                                                    3x4
                                                @elseif($item->C5 == 3)
                                                    4x5
                                                @else
                                                    5x6
                                                @endif
                                            @break

                                            @case('C6')
                                                @if ($item->C6 == 1)
                                                    Tidak ada keamanan
                                                @elseif($item->C6 == 2)
                                                    Satpam atau penjaga
                                                @elseif($item->C6 == 3)
                                                    CCTV
                                                @else
                                                    CCTV dan satpam atau penjaga
                                                @endif
                                            @break

                                            @case('C7')
                                                @if ($item->C7 == 1)
                                                    21:00-22:00
                                                @elseif($item->C7 == 2)
                                                    23:00-24:00
                                                @elseif($item->C7 == 3)
                                                    01:00-02:00
                                                @else
                                                    Tidak ada batas jam malam
                                                @endif
                                            @break

                                            @case('C8')
                                                @if ($item->C8 == 3)
                                                    Prabayar/token listrik
                                                @else
                                                    Pascabayar/bulanan
                                                @endif
                                            @break

                                            @case('C9')
                                                @if ($item->C9 == 2)
                                                    Di Bersihkan Setiap Hari
                                                @elseif($item->C9 == 3)
                                                    Di Bersihkan Setiap Minggu
                                                @else
                                                    Di Bersihkan Setiap Bulan
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
