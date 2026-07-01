<div class="card table-card">
  <div class="card-header d-flex align-items-center justify-content-between">
    <h6 class="mb-0 fw-bold"><i class="fas fa-concierge-bell me-2" style="color:#1e88e5;"></i>Data Layanan</h6>
    <a href="<?= site_url('layanan/tambah') ?>" class="btn btn-sm btn-primary rounded-pill">
      <i class="fas fa-plus me-1"></i>Tambah Layanan
    </a>
  </div>
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover mb-0">
        <thead><tr>
          <th width="50">#</th>
          <th>Nama Layanan</th>
          <th>Harga/kg</th>
          <th>Keterangan</th>
          <th width="120">Aksi</th>
        </tr></thead>
        <tbody>
        <?php $no=1; foreach ($layanan as $l): ?>
        <tr>
          <td><?= $no++ ?></td>
          <td class="fw-500"><?= $l['nama_layanan'] ?></td>
          <td>Rp <?= number_format($l['harga_per_kg'],0,',','.') ?></td>
          <td><?= $l['keterangan'] ?: '<span class="text-muted">-</span>' ?></td>
          <td>
            <a href="<?= site_url('layanan/edit/'.$l['id_layanan']) ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
            <a href="<?= site_url('layanan/hapus/'.$l['id_layanan']) ?>" class="btn btn-sm btn-danger"
               onclick="return confirm('Hapus layanan ini?')"><i class="fas fa-trash"></i></a>
          </td>
        </tr>
        <?php endforeach; ?>
        <?php if (empty($layanan)): ?>
        <tr><td colspan="5" class="text-center py-4 text-muted">Belum ada data layanan</td></tr>
        <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
