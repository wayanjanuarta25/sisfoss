@extends('layouts.sbadmin')

@section('title', 'Tambah Personel')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
        <div>
            <h1 class="mb-0">Tambah Personel</h1>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('personel.index') }}">Personel</a></li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-user-plus me-1"></i> Formulir Tambah Personel
        </div>
        <div class="card-body">
            <form action="{{ route('personel.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="col-md-6">
                        <label for="pangkat" class="form-label">Pangkat</label>
                        <input type="text" class="form-control" id="pangkat" name="pangkat" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nrp" class="form-label">NRP</label>
                        <input type="text" class="form-control" id="nrp" name="nrp" required>
                    </div>
                    <div class="col-md-6">
                        <label for="matra" class="form-label">Matra</label>
                        <select class="form-select" id="matra" name="matra" required>
                            <option value="" disabled selected>-- Pilih Matra --</option>
                            <option value="AD">AD</option>
                            <option value="AL">AL</option>
                            <option value="AU">AU</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="corps" class="form-label">Corps</label>
                        <input type="text" class="form-control" id="corps" name="corps" required>
                    </div>
                    <div class="col-md-6">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="tmt_tni" class="form-label">TMT TNI</label>
                        <input type="date" class="form-control" id="tmt_tni" name="tmt_tni" required>
                    </div>
                    <div class="col-md-6">
                        <label for="tmt_jabatan" class="form-label">TMT Jabatan</label>
                        <input type="date" class="form-control" id="tmt_jabatan" name="tmt_jabatan" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="satuan_pelaksana" class="form-label">Satuan Pelaksana</label>
                    <input type="text" class="form-control" id="satuan_pelaksana" name="satuan_pelaksana" required>
                </div>

                <div class="mb-4">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Simpan
                </button>
                <a href="{{ route('personel.index') }}" class="btn btn-secondary ms-2">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
