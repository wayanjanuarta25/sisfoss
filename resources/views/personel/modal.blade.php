<!-- Modal Detail Personel -->
<div class="modal fade" id="detailPersonelModal" tabindex="-1" aria-labelledby="detailPersonelModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Personel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <img id="modalFoto" src="" alt="Foto Personel" class="img-thumbnail rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                </div>
                <div class="row mb-2">
                    <div class="col-md-4 fw-bold">Nama</div>
                    <div class="col-md-8" id="modalNama">-</div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-4 fw-bold">Pangkat</div>
                    <div class="col-md-8" id="modalPangkat">-</div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-4 fw-bold">NRP</div>
                    <div class="col-md-8" id="modalNRP">-</div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-4 fw-bold">Jabatan</div>
                    <div class="col-md-8" id="modalJabatan">-</div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <div>
                    <button id="btnEditPersonel" class="btn btn-primary">
                        <i class="fas fa-edit me-1"></i> Edit
                    </button>
                    <button id="btnDeletePersonel" class="btn btn-danger">
                        <i class="fas fa-trash me-1"></i> Hapus
                    </button>
                </div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
