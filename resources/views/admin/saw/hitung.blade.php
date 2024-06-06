@extends('layouts.admin')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Bobot Kriteria</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            @foreach ($criteria as $criterion)
                                <th>{{ $criterion->nama }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($criteria as $criterion)
                                <td>{{ $widgets[$criterion->kode] }}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- NORMALISASI --}}
    @include('admin.saw.normalisasi')

    <!-- Hasil Pemilihan Kost Terbaik -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Hasil Pemilihan Kost Terbaik</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="resultTable">
                <thead>
                    <tr>
                        <th>Nama Kost</th>
                        <th>Hasil</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $name => $score)
                        <tr>
                            <td>{{ $name }}</td>
                            <td>{{ number_format($score, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('after-script')
    <script>
        window.addEventListener('DOMContentLoaded', event => {


            const datatablesSimple = document.getElementById('normalisasiTable');
            if (datatablesSimple) {
                new simpleDatatables.DataTable(datatablesSimple);
            }

            const resultTable = document.getElementById('resultTable');
            if (resultTable) {
                new simpleDatatables.DataTable(resultTable);
            }
        });
    </script>
@endsection
