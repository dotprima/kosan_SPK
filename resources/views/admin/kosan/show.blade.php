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
                        <tr>
                            <th>Image</th>
                            <td>
                                @if ($kosan->image)
                                    <img src="{{ asset('storage/' . $kosan->image) }}" alt="Image" width="100">
                                @else
                                    <img src="{{ asset('img/dummy.jpg') }}" alt="Dummy Image" width="100">
                                @endif
                            </td>
                        </tr>
                    </table>
                    <a href="{{ route('kosan.edit', $kosan->id) }}" class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
