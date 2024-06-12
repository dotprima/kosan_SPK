@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Kosan</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama</th>
                            <td>{{ $kosan->nama }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $kosan->alamat }}</td>
                        </tr>
                        <tr>
                            <th>Kontak</th>
                            <td>{{ $kosan->kontak }}</td>
                        </tr>
                        <tr>
                            <th>Lokasi</th>
                            <td>{{ $kosan->lokasi }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
