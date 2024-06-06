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
                            <th>Nama</th>
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
                                <td>{{ $item->nama }}</td>
                                @foreach ($kriteria as $criterion)
                                    <td>{{ $item->{$criterion->kode} }}</td>
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
