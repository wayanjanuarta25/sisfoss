@extends('layouts.sbadmin')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        DSP Personel Satsiber TNI
                    </div>
                    <div class="card-body">
                        <canvas id="myBarChart" width="100%" height="40"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-pie me-1"></i>
                        Golongan Personel Satsiber TNI
                    </div>
                    <div class="card-body">
                        <canvas id="myPieChart" width="100%" height="50"></canvas>
                    </div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Personel Satsiber TNI
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Pangkat</th>
                            <th>NRP</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($personels as $index => $p)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    @if ($p->foto)
                                        <img src="{{ asset('storage/' . $p->foto) }}" alt="Foto {{ $p->nama }}"
                                            class="img-thumbnail rounded-circle"
                                            style="width: 60px; height: 60px; object-fit: cover;">
                                    @else
                                        <span class="text-muted">Tidak ada</span>
                                    @endif
                                </td>

                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->pangkat }}</td>
                                <td>{{ $p->nrp }}</td>
                                <td>{{ $p->jabatan }}</td>
                                <td>
                                    <button class="btn btn-sm btn-info"
                                        onclick='showPersonelDetail({!! json_encode([
                                            'nama' => $p->nama,
                                            'pangkat' => $p->pangkat,
                                            'nrp' => $p->nrp,
                                            'jabatan' => $p->jabatan,
                                            'matra' => $p->matra,
                                            'corps' => $p->corps,
                                            'tmt_tni' => $p->tmt_tni,
                                            'tmt_jabatan' => $p->tmt_jabatan,
                                            'satuan_pelaksana' => $p->satuan_pelaksana,
                                            'foto' => $p->foto ? asset('storage/' . $p->foto) : asset('default.png'),
                                            'edit_url' => route('personel.edit', $p->id),
                                            'delete_url' => route('personel.destroy', $p->id),
                                        ]) !!})' data-bs-toggle="modal"
                                        data-bs-target="#detailPersonelModal">
                                        <i class="fas fa-eye me-1"></i> Detail
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('personel.modal')
@endsection

@section('scripts')
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>
    <script src="{{ asset('assets/demo/chart-pie-demo.js') }}"></script>
    <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
@endsection

@push('scripts')
<script>
    function showPersonelDetail(data) {
        const modalEl = document.getElementById('detailPersonelModal');

        modalEl.querySelector('#modalNama').textContent = data.nama || '-';
        modalEl.querySelector('#modalPangkat').textContent = data.pangkat || '-';
        modalEl.querySelector('#modalNRP').textContent = data.nrp || '-';
        modalEl.querySelector('#modalJabatan').textContent = data.jabatan || '-';
        modalEl.querySelector('#modalMatra').textContent = data.matra || '-';
        modalEl.querySelector('#modalCorps').textContent = data.corps || '-';
        modalEl.querySelector('#modalTmtTni').textContent = data.tmt_tni || '-';
        modalEl.querySelector('#modalTmtJabatan').textContent = data.tmt_jabatan || '-';
        modalEl.querySelector('#modalSatuan').textContent = data.satuan_pelaksana || '-';

        modalEl.querySelector('#modalFoto').src = data.foto || '{{ asset("default.png") }}';

        modalEl.querySelector('#btnEditPersonel').onclick = () => window.location.href = data.edit_url;
        modalEl.querySelector('#btnDeletePersonel').onclick = () => {
            if (confirm('Yakin ingin menghapus personel ini?')) {
                window.location.href = data.delete_url;
            }
        };
    }
</script>
@endpush
