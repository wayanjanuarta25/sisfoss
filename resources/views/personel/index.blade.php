@extends('layouts.sbadmin') {{-- Sesuaikan dengan layout SB Admin kamu --}}
@section('title', 'Data Personel')

@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
            <div>
                <h1 class="mb-0">Personel</h1>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item active">Personel Satsiber TNI</li>
                </ol>
            </div>
            <a href="{{ route('personel.create') }}" class="btn btn-success">
                <i class="fas fa-plus me-1"></i> Tambah Personel
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

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
                                    <a href="#" class="btn btn-sm btn-info btn-detail" data-bs-toggle="modal"
                                        data-bs-target="#detailPersonelModal" data-nama="{{ $p->nama }}"
                                        data-pangkat="{{ $p->pangkat }}" data-nrp="{{ $p->nrp }}"
                                        data-jabatan="{{ $p->jabatan }}"
                                        data-foto="{{ $p->foto ? asset('storage/' . $p->foto) : asset('default.png') }}"
                                        data-edit-url="{{ route('personel.edit', $p->id) }}"
                                        data-delete-url="{{ route('personel.destroy', $p->id) }}">
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

    @include('personel.modal')
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = new bootstrap.Modal(document.getElementById('detailPersonelModal'));
            const modalEl = document.getElementById('detailPersonelModal');
            const detailButtons = document.querySelectorAll('.btn-detail');

            detailButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const nama = this.dataset.nama;
                    const pangkat = this.dataset.pangkat;
                    const nrp = this.dataset.nrp;
                    const jabatan = this.dataset.jabatan;
                    const foto = this.dataset.foto;
                    const editUrl = this.dataset.editUrl;
                    const deleteUrl = this.dataset.deleteUrl;

                    modalEl.querySelector('#modalNama').textContent = nama;
                    modalEl.querySelector('#modalPangkat').textContent = pangkat;
                    modalEl.querySelector('#modalNRP').textContent = nrp;
                    modalEl.querySelector('#modalJabatan').textContent = jabatan;
                    modalEl.querySelector('#modalFoto').src = foto;

                    modalEl.querySelector('#btnEditPersonel').onclick = () => window.location.href =
                        editUrl;
                    modalEl.querySelector('#btnDeletePersonel').onclick = () => {
                        if (confirm('Yakin ingin menghapus data ini?')) {
                            window.location.href = deleteUrl;
                        }
                    };

                    modal.show(); // Tampilkan modal saat tombol diklik
                });
            });
        });
    </script>
@endpush
