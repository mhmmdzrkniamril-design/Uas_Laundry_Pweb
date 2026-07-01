<!-- ADMIN DASHBOARD -->
<div class="d-flex align-items-center justify-content-between mb-4">
  <div>
    <h4 class="fw-bold mb-1" style="color:#1a237e;">Dashboard Admin</h4>
    <p class="text-muted mb-0" style="font-size:0.88rem;">Selamat datang kembali, <?= $this->session->userdata('nama') ?> 👋</p>
  </div>
  <div class="d-flex gap-2">
    <span class="badge rounded-pill px-3 py-2" style="background:#e3f2fd;color:#1565c0;font-size:0.8rem;">
      <i class="fas fa-calendar-day me-1"></i><?= date('d M Y') ?>
    </span>
  </div>
</div>

<!-- STAT CARDS -->
<div class="row g-3 mb-4">
  <div class="col-sm-6 col-xl-3">
    <div class="stat-card card p-3">
      <div class="d-flex align-items-center gap-3">
        <div class="icon-box" style="background:#e3f2fd;"><i class="fas fa-users" style="color:#1e88e5;"></i></div>
        <div class="flex-grow-1">
          <div class="stat-value text-dark"><?= $total_pelanggan ?></div>
          <div class="stat-label">Total Pelanggan</div>
        </div>
      </div>
      <div class="mt-2 pt-2" style="border-top:1px solid #f0f4f8;">
        <small class="text-success"><i class="fas fa-arrow-up me-1"></i>Data terdaftar</small>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="stat-card card p-3">
      <div class="d-flex align-items-center gap-3">
        <div class="icon-box" style="background:#e8f5e9;"><i class="fas fa-receipt" style="color:#43a047;"></i></div>
        <div class="flex-grow-1">
          <div class="stat-value text-dark"><?= $total_transaksi ?></div>
          <div class="stat-label">Total Transaksi</div>
        </div>
      </div>
      <div class="mt-2 pt-2" style="border-top:1px solid #f0f4f8;">
        <small class="text-success"><i class="fas fa-arrow-up me-1"></i>Semua transaksi</small>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="stat-card card p-3">
      <div class="d-flex align-items-center gap-3">
        <div class="icon-box" style="background:#fff3e0;"><i class="fas fa-check-circle" style="color:#fb8c00;"></i></div>
        <div class="flex-grow-1">
          <div class="stat-value text-dark"><?= $status_selesai + $status_diambil ?></div>
          <div class="stat-label">Laundry Selesai</div>
        </div>
      </div>
      <div class="mt-2 pt-2" style="border-top:1px solid #f0f4f8;">
        <small class="text-warning"><i class="fas fa-check me-1"></i>Selesai & diambil</small>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="stat-card card p-3">
      <div class="d-flex align-items-center gap-3">
        <div class="icon-box" style="background:#f3e5f5;"><i class="fas fa-wallet" style="color:#8e24aa;"></i></div>
        <div class="flex-grow-1">
          <div class="stat-value text-dark" style="font-size:1.3rem;">Rp <?= number_format($total_pendapatan,0,',','.') ?></div>
          <div class="stat-label">Total Pendapatan</div>
        </div>
      </div>
      <div class="mt-2 pt-2" style="border-top:1px solid #f0f4f8;">
        <small class="text-success"><i class="fas fa-arrow-up me-1"></i>Dari laundry diambil</small>
      </div>
    </div>
  </div>
</div>

<!-- STATUS CARDS ROW -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="card p-3 text-center" style="border-radius:14px;border:none;box-shadow:var(--card-shadow);background:#e3f2fd;">
      <div class="fw-bold" style="font-size:2rem;color:#1565c0;"><?= $status_diterima ?></div>
      <div style="font-size:0.8rem;color:#1565c0;font-weight:500;">Diterima</div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="card p-3 text-center" style="border-radius:14px;border:none;box-shadow:var(--card-shadow);background:#fff3e0;">
      <div class="fw-bold" style="font-size:2rem;color:#e65100;"><?= $status_diproses ?></div>
      <div style="font-size:0.8rem;color:#e65100;font-weight:500;">Diproses</div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="card p-3 text-center" style="border-radius:14px;border:none;box-shadow:var(--card-shadow);background:#e8f5e9;">
      <div class="fw-bold" style="font-size:2rem;color:#2e7d32;"><?= $status_selesai ?></div>
      <div style="font-size:0.8rem;color:#2e7d32;font-weight:500;">Selesai</div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="card p-3 text-center" style="border-radius:14px;border:none;box-shadow:var(--card-shadow);background:#f3e5f5;">
      <div class="fw-bold" style="font-size:2rem;color:#6a1b9a;"><?= $status_diambil ?></div>
      <div style="font-size:0.8rem;color:#6a1b9a;font-weight:500;">Diambil</div>
    </div>
  </div>
</div>

<!-- TRANSAKSI TERBARU + GRAFIK -->
<div class="row g-4">
  <div class="col-lg-7">
    <div class="card table-card h-100">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h6 class="mb-0 fw-bold"><i class="fas fa-list-alt me-2 text-primary"></i>Transaksi Terbaru</h6>
        <a href="<?= site_url('transaksi') ?>" class="btn btn-sm btn-primary rounded-pill px-3" style="font-size:0.78rem;">
          Lihat Semua
        </a>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-hover mb-0 align-middle">
            <thead><tr>
              <th>No</th><th>Invoice</th><th>Pelanggan</th><th>Layanan</th><th>Berat</th><th>Status</th><th>Total</th><th>Tanggal</th>
            </tr></thead>
            <tbody>
            <?php $no=1; foreach ($transaksi_terbaru as $t): ?>
            <tr>
              <td class="text-muted" style="font-size:0.8rem;"><?= $no++ ?></td>
              <td><code style="font-size:0.78rem;background:#f0f4f8;padding:2px 6px;border-radius:4px;"><?= $t['kode_transaksi'] ?></code></td>
              <td style="font-size:0.85rem;"><?= $t['nama_pelanggan'] ?></td>
              <td style="font-size:0.83rem;"><?= $t['nama_layanan'] ?></td>
              <td style="font-size:0.83rem;"><?= $t['berat_kg'] ?> Kg</td>
              <td><span class="badge-<?= strtolower($t['status']) ?>"><?= $t['status'] ?></span></td>
              <td style="font-size:0.83rem;font-weight:600;">Rp <?= number_format($t['total_harga'],0,',','.') ?></td>
              <td style="font-size:0.78rem;color:#64748b;"><?= date('d M Y', strtotime($t['tanggal_masuk'])) ?></td>
            </tr>
            <?php endforeach; ?>
            <?php if (empty($transaksi_terbaru)): ?>
            <tr><td colspan="8" class="text-center py-4 text-muted">Belum ada transaksi</td></tr>
            <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-5">
    <div class="card table-card h-100">
      <div class="card-header">
        <h6 class="mb-0 fw-bold"><i class="fas fa-chart-line me-2 text-primary"></i>Grafik Transaksi (6 Bulan Terakhir)</h6>
      </div>
      <div class="card-body d-flex align-items-center justify-content-center">
        <canvas id="grafikTransaksi" style="max-height:220px;"></canvas>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
(function(){
  var ctx = document.getElementById('grafikTransaksi').getContext('2d');
  var labels = <?= json_encode($bulan_labels ?? ['Jan','Feb','Mar','Apr','Mei','Jun']) ?>;
  var dataCounts = <?= json_encode($bulan_data ?? [0,0,0,0,0,0]) ?>;
  new Chart(ctx, {
    type: 'line',
    data: {
      labels: labels,
      datasets: [{
        label: 'Transaksi',
        data: dataCounts,
        borderColor: '#1e88e5',
        backgroundColor: 'rgba(30,136,229,0.1)',
        tension: 0.4,
        fill: true,
        pointBackgroundColor: '#1e88e5',
        pointRadius: 5,
        pointHoverRadius: 7
      }]
    },
    options: {
      responsive: true,
      plugins: { legend: { display: false } },
      scales: {
        y: { beginAtZero: true, grid: { color: '#f0f4f8' }, ticks: { font: { size: 11 } } },
        x: { grid: { display: false }, ticks: { font: { size: 11 } } }
      }
    }
  });
})();
</script>
