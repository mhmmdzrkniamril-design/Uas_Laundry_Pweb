<div class="card table-card">
  <div class="card-header d-flex align-items-center justify-content-between">
    <h6 class="mb-0 fw-bold"><i class="fas fa-receipt me-2" style="color:#1e88e5;"></i>Data Transaksi</h6>
    <a href="<?= site_url('transaksi/tambah') ?>" class="btn btn-sm btn-primary rounded-pill">
      <i class="fas fa-plus me-1"></i>Transaksi Baru
    </a>
  </div>
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover mb-0">
        <thead><tr>
          <th>#</th>
          <th>Kode</th>
          <th>Pelanggan</th>
          <th>Layanan</th>
          <th>Berat</th>
          <th>Total</th>
          <th>Tgl Masuk</th>
          <th>Tgl Selesai</th>
          <th>Status</th>
          <th width="130">Aksi</th>
        </tr></thead>
        <tbody>
        <?php $no=1; foreach ($transaksi as $t): ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><code><?= $t['kode_transaksi'] ?></code></td>
          <td><?= $t['nama_pelanggan'] ?></td>
          <td><?= $t['nama_layanan'] ?></td>
          <td><?= $t['berat_kg'] ?> kg</td>
          <td class="fw-500">Rp <?= number_format($t['total_harga'],0,',','.') ?></td>
          <td><?= date('d/m/Y', strtotime($t['tanggal_masuk'])) ?></td>
          <td><?= date('d/m/Y', strtotime($t['tanggal_selesai'])) ?></td>
          <td><span class="badge-<?= strtolower($t['status']) ?>"><?= $t['status'] ?></span></td>
          <td>
            <div class="d-flex gap-1 flex-wrap">
              <a href="<?= site_url('transaksi/nota/'.$t['id_transaksi']) ?>" target="_blank"
                 class="btn btn-sm btn-info" title="Nota"><i class="fas fa-print"></i></a>
              <a href="<?= site_url('transaksi/edit/'.$t['id_transaksi']) ?>"
                 class="btn btn-sm btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
              <a href="<?= site_url('transaksi/hapus/'.$t['id_transaksi']) ?>"
                 class="btn btn-sm btn-danger" onclick="return confirm('Hapus transaksi ini?')"
                 title="Hapus"><i class="fas fa-trash"></i></a>
            </div>
          </td>
        </tr>
        <?php endforeach; ?>
        <?php if (empty($transaksi)): ?>
        <tr><td colspan="10" class="text-center py-4 text-muted">Belum ada transaksi</td></tr>
        <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
