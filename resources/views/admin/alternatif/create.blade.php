@extends('layouts.admin')
@section('content')

    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
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
                        <label>Nama Kost</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label>Harga Sewa</label>
                        <input type="number" class="form-control" name="C1" required>
                    </div>
                    <div class="form-group">
                        <label>Jarak ke Kampus (km)</label>
                        <input type="number" class="form-control" name="C2" step="0.1" required>
                    </div>
                    <div class="form-group">
                        <label>Rating Fasilitas (1-10)</label>
                        <input type="number" class="form-control" name="C3" min="1" max="10" required>
                    </div>
                    <div class="form-group">
                        <label>Luas Kamar (m²)</label>
                        <input type="number" class="form-control" name="C4" required>
                    </div>
                    <div class="form-group">
                        <label>Level Keamanan (1-10)</label>
                        <input type="number" class="form-control" name="C5" min="1" max="10" required>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-block">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




@endsection
