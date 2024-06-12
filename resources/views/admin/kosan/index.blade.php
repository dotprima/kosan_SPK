@extends('layouts.admin')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('kosan.create') }}" class="btn btn-primary float-right">
                <i class="fas fa-fw fa-plus-circle"></i> Tambah Data
            </a>
            <h5 class="m-0 font-weight-bold text-primary">Alternatif</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="kosanTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Kontak</th>
                            <th>Lokasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($kosans as $kosan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kosan->nama }}</td>
                                <td>{{ $kosan->alamat }}</td>
                                <td>{{ $kosan->kontak }}</td>
                                <td>{{ $kosan->lokasi }}</td>
                                <td>
                                    <a href="{{ route('kosan.show', $kosan->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('kosan.edit', $kosan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('kosan.destroy', $kosan->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
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


            const kosanTable = document.getElementById('kosanTable');
            if (kosanTable) {
                new simpleDatatables.DataTable(kosanTable);
            }


        });
    </script>
@endsection