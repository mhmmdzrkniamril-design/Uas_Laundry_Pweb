<div class="d-flex align-items-center justify-content-between mb-4">
  <div>
    <h4 class="fw-bold mb-1" style="color:#1a237e;">Laporan Transaksi</h4>
    <p class="text-muted mb-0" style="font-size:.88rem;">Rekap semua transaksi laundry</p>
  </div>
  <button onclick="window.print()" class="btn btn-sm btn-outline-primary rounded-pill"><i class="fas fa-print me-1"></i>Cetak</button>
</div>
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3"><div class="stat-card card p-3"><div class="d-flex align-items-center gap-3"><div class="icon-box" style="background:#e3f2fd;"><i class="fas fa-receipt" style="color:#1e88e5;"></i></div><div><div class="stat-value text-dark"><?= $total_transaksi ?></div><div class="stat-label">Total Transaksi</div></div></div></div></div>
  <div class="col-6 col-md-3"><div class="stat-card card p-3"><div class="d-flex align-items-center gap-3"><div class="icon-box" style="background:#fff3e0;"><i class="fas fa-hourglass" style="color:#fb8c00;"></i></div><div><div class="stat-value text-dark"><?= $status_diproses ?></div><div class="stat-label">Sedang Diproses</div></div></div></div></div>
  <div class="col-6 col-md-3"><div class="stat-card card p-3"><div class="d-flex align-items-center gap-3"><div class="icon-box" style="background:#e8f5e9;"><i class="fas fa-check-circle" style="color:#43a047;"></i></div><div><div class="stat-value text-dark"><?= $status_selesai + $status_diambil ?></div><div class="stat-label">Selesai</div></div></div></div></div>
  <div class="col-6 col-md-3"><div class="stat-card card p-3"><div class="d-flex align-items-center gap-3"><div class="icon-box" style="background:#f3e5f5;"><i class="fas fa-wallet" style="color:#8e24aa;"></i></div><div><div class="stat-value text-dark" style="font-size:1.1rem;">Rp <?= number_format($total_pendapatan,0,',','.') ?></div><div class="stat-label">Total Pendapatan</div></div></div></div></div>
</div>
<div class="card table-card">
  <div class="card-header"><h6 class="mb-0 fw-bold"><i class="fas fa-table me-2 text-primary"></i>Semua Data Transaksi</h6></div>
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover mb-0 align-middle">
        <thead><tr><th>No</th><th>Kode</th><th>Pelanggan</th><th>Layanan</th><th>Berat</th><th>Tgl Masuk</th><th>Tgl Selesai</th><th>Status</th><th>Total</th></tr></thead>
        <tbody>
        <?php $no=1; foreach ($transaksi as $t): ?>
        <tr>
          <td class="text-muted" style="font-size:.8rem;"><?= $no++ ?></td>
          <td><code style="font-size:.78rem;"><?= $t['kode_transaksi'] ?></code></td>
          <td style="font-size:.83rem;"><?= $t['nama_pelanggan'] ?></td>
          <td style="font-size:.83rem;"><?= $t['nama_layanan'] ?></td>
          <td style="font-size:.83rem;"><?= $t['berat_kg'] ?> kg</td>
          <td style="font-size:.8rem;"><?= date('d M Y',strtotime($t['tanggal_masuk'])) ?></td>
          <td style="font-size:.8rem;"><?= date('d M Y',strtotime($t['tanggal_selesai'])) ?></td>
          <td><span class="badge-<?= strtolower($t['status']) ?>"><?= $t['status'] ?></span></td>
          <td style="font-size:.83rem;font-weight:600;">Rp <?= number_format($t['total_harga'],0,',','.') ?></td>
        </tr>
        <?php endforeach; ?>
        <?php if(empty($transaksi)): ?><tr><td colspan="9" class="text-center py-4 text-muted">Tidak ada data</td></tr><?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
