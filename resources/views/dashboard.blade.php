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
                                    <a href="#"
   class="btn-detail"
   data-bs-toggle="modal"
   data-bs-target="#detailPersonelModal"
   data-nama="{{ $p->nama }}"
   data-pangkat="{{ $p->pangkat }}"
   data-nrp="{{ $p->nrp }}"
   data-jabatan="{{ $p->jabatan }}"
   data-foto="{{ asset('storage/' . $p->foto) }}"
   data-edit-url="{{ route('personel.edit', $p->id) }}"
   data-delete-url="{{ route('personel.destroy', $p->id) }}"
>
    Detail
</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>
    <script src="{{ asset('assets/demo/chart-pie-demo.js') }}"></script>
    <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
@endsection
