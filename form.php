<div class="row justify-content-center">
  <div class="col-md-7">
    <div class="card table-card">
      <div class="card-header">
        <h6 class="mb-0 fw-bold">
          <i class="fas fa-user me-2" style="color:#1e88e5;"></i>
          <?= isset($pelanggan) ? 'Edit' : 'Tambah' ?> Pelanggan
        </h6>
      </div>
      <div class="card-body">
        <form method="POST" action="<?= site_url(isset($pelanggan) ? 'pelanggan/update/'.$pelanggan['id_pelanggan'] : 'pelanggan/simpan') ?>">
          <div class="mb-3">
            <label class="form-label fw-500">Nama Pelanggan <span class="text-danger">*</span></label>
            <input type="text" name="nama_pelanggan" class="form-control"
              value="<?= isset($pelanggan) ? $pelanggan['nama_pelanggan'] : '' ?>"
              placeholder="Masukkan nama lengkap" required>
          </div>
          <div class="mb-3">
            <label class="form-label fw-500">No. Telepon <span class="text-danger">*</span></label>
            <input type="text" name="telepon" class="form-control"
              value="<?= isset($pelanggan) ? $pelanggan['telepon'] : '' ?>"
              placeholder="Contoh: 08123456789" required>
          </div>
          <div class="mb-3">
            <label class="form-label fw-500">Email</label>
            <input type="email" name="email" class="form-control"
              value="<?= isset($pelanggan) ? $pelanggan['email'] : '' ?>"
              placeholder="email@contoh.com">
          </div>
          <div class="mb-4">
            <label class="form-label fw-500">Alamat</label>
            <textarea name="alamat" class="form-control" rows="3"
              placeholder="Masukkan alamat lengkap"><?= isset($pelanggan) ? $pelanggan['alamat'] : '' ?></textarea>
          </div>
          <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary rounded-pill px-4">
              <i class="fas fa-save me-1"></i>Simpan
            </button>
            <a href="<?= site_url('pelanggan') ?>" class="btn btn-outline-secondary rounded-pill px-4">
              <i class="fas fa-arrow-left me-1"></i>Kembali
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
