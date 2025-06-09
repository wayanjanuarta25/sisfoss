@extends('layouts.sbadmin') {{-- Sesuaikan dengan layout kamu --}}
@section('title', 'Edit Personel')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Data Personel</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('personel.index') }}">Personel</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-user-edit me-1"></i>
            Form Edit Personel
        </div>
        <div class="card-body">
            <form action="{{ route('personel.update', $personel->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama', $personel->nama) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="pangkat" class="form-label">Pangkat</label>
                        <input type="text" name="pangkat" class="form-control" value="{{ old('pangkat', $personel->pangkat) }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nrp" class="form-label">NRP</label>
                        <input type="text" name="nrp" class="form-control" value="{{ old('nrp', $personel->nrp) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="matra" class="form-label">Matra</label>
                        <input type="text" name="matra" class="form-control" value="{{ old('matra', $personel->matra) }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="corps" class="form-label">Corps</label>
                        <input type="text" name="corps" class="form-control" value="{{ old('corps', $personel->corps) }}">
                    </div>
                    <div class="col-md-6">
                        <label for="tmt_tni" class="form-label">TMT TNI</label>
                        <input type="date" name="tmt_tni" class="form-control" value="{{ old('tmt_tni', $personel->tmt_tni) }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="tmt_jabatan" class="form-label">TMT Jabatan</label>
                        <input type="date" name="tmt_jabatan" class="form-control" value="{{ old('tmt_jabatan', $personel->tmt_jabatan) }}">
                    </div>
                    <div class="col-md-6">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan', $personel->jabatan) }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="satuan_pelaksana" class="form-label">Satuan Pelaksana</label>
                    <input type="text" name="satuan_pelaksana" class="form-control" value="{{ old('satuan_pelaksana', $personel->satuan_pelaksana) }}">
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" name="foto" class="form-control">
                    @if ($personel->foto)
                        <small class="d-block mt-2">Foto saat ini:</small>
                        <img src="{{ asset('storage/' . $personel->foto) }}" alt="Foto Personel" class="img-thumbnail" style="width: 150px;">
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Simpan Perubahan
                </button>
                <a href="{{ route('personel.index') }}" class="btn btn-secondary ms-2">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
