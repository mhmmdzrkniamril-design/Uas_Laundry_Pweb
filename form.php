<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card table-card">
      <div class="card-header">
        <h6 class="mb-0 fw-bold">
          <i class="fas fa-concierge-bell me-2" style="color:#1e88e5;"></i>
          <?= isset($layanan) ? 'Edit' : 'Tambah' ?> Layanan
        </h6>
      </div>
      <div class="card-body">
        <form method="POST" action="<?= site_url(isset($layanan) ? 'layanan/update/'.$layanan['id_layanan'] : 'layanan/simpan') ?>">
          <div class="mb-3">
            <label class="form-label fw-500">Nama Layanan <span class="text-danger">*</span></label>
            <input type="text" name="nama_layanan" class="form-control"
              value="<?= isset($layanan) ? $layanan['nama_layanan'] : '' ?>"
              placeholder="Contoh: Cuci & Setrika" required>
          </div>
          <div class="mb-3">
            <label class="form-label fw-500">Harga per KG (Rp) <span class="text-danger">*</span></label>
            <div class="input-group">
              <span class="input-group-text">Rp</span>
              <input type="number" name="harga_per_kg" class="form-control"
                value="<?= isset($layanan) ? $layanan['harga_per_kg'] : '' ?>"
                placeholder="0" min="0" step="500" required>
            </div>
          </div>
          <div class="mb-4">
            <label class="form-label fw-500">Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="2"
              placeholder="Deskripsi singkat layanan"><?= isset($layanan) ? $layanan['keterangan'] : '' ?></textarea>
          </div>
          <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary rounded-pill px-4">
              <i class="fas fa-save me-1"></i>Simpan
            </button>
            <a href="<?= site_url('layanan') ?>" class="btn btn-outline-secondary rounded-pill px-4">
              <i class="fas fa-arrow-left me-1"></i>Kembali
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
