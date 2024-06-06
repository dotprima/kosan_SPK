<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Normalisasi Kriteria</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="normalisasiTable">
            <thead>
                <tr>
                    <th>Nama Kost</th>
                    @foreach ($criteria as $criterion)
                        <th>{{ $criterion->nama }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                        @foreach ($criteria as $criterion)
                            <td>{{ number_format($normalizedData[$item->nama][$criterion->kode], 2) }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
