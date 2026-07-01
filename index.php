<div class="card table-card">
  <div class="card-header d-flex align-items-center justify-content-between">
    <h6 class="mb-0 fw-bold"><i class="fas fa-users me-2" style="color:#1e88e5;"></i>Data Pelanggan</h6>
    <a href="<?= site_url('pelanggan/tambah') ?>" class="btn btn-sm btn-primary rounded-pill">
      <i class="fas fa-plus me-1"></i>Tambah Pelanggan
    </a>
  </div>
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover mb-0">
        <thead><tr>
          <th width="50">#</th>
          <th>Nama Pelanggan</th>
          <th>Telepon</th>
          <th>Email</th>
          <th>Alamat</th>
          <th>Tgl Daftar</th>
          <th width="120">Aksi</th>
        </tr></thead>
        <tbody>
        <?php $no=1; foreach ($pelanggan as $p): ?>
        <tr>
          <td><?= $no++ ?></td>
          <td class="fw-500"><?= htmlspecialchars($p['nama_pelanggan']) ?></td>
          <td><?= htmlspecialchars($p['telepon']) ?></td>
          <td><?= $p['email'] ?: '<span class="text-muted">-</span>' ?></td>
          <td><?= $p['alamat'] ? substr($p['alamat'],0,40).'...' : '<span class="text-muted">-</span>' ?></td>
          <td><?= date('d/m/Y', strtotime($p['created_at'])) ?></td>
          <td>
            <a href="<?= site_url('pelanggan/edit/'.$p['id_pelanggan']) ?>" class="btn btn-sm btn-warning" title="Edit">
              <i class="fas fa-edit"></i>
            </a>
            <a href="<?= site_url('pelanggan/hapus/'.$p['id_pelanggan']) ?>" class="btn btn-sm btn-danger"
               onclick="return confirm('Hapus pelanggan ini?')" title="Hapus">
              <i class="fas fa-trash"></i>
            </a>
          </td>
        </tr>
        <?php endforeach; ?>
        <?php if (empty($pelanggan)): ?>
        <tr><td colspan="7" class="text-center py-4 text-muted">Belum ada data pelanggan</td></tr>
        <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
