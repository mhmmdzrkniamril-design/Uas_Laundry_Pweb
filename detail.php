<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Detail Transaksi - UAS Laundry</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
*{font-family:'Poppins',sans-serif;}body{background:#f0f4f8;margin:0;}
.d-flex{display:flex;}
.sidebar{width:240px;min-width:240px;min-height:100vh;background:linear-gradient(180deg,#1a5c38 0%,#2d8a57 100%);box-shadow:4px 0 15px rgba(0,0,0,.15);display:flex;flex-direction:column;}
.sidebar .brand{padding:20px 15px;border-bottom:1px solid rgba(255,255,255,.15);}
.sidebar .brand h4{color:#fff;font-weight:700;margin:0;font-size:1.1rem;}
.sidebar .brand p{color:rgba(255,255,255,.7);font-size:.75rem;margin:0;}
.sidebar nav{flex:1;padding:10px 0;}
.sidebar .nav-section{color:rgba(255,255,255,.45);font-size:.7rem;text-transform:uppercase;letter-spacing:1.5px;padding:10px 20px 4px;display:block;}
.sidebar .nav-link{color:rgba(255,255,255,.8);padding:11px 20px;border-radius:8px;margin:2px 10px;transition:all .2s;display:flex;align-items:center;gap:10px;text-decoration:none;}
.sidebar .nav-link:hover,.sidebar .nav-link.active{background:rgba(255,255,255,.18);color:#fff;}
.sidebar .user-bottom{padding:15px;border-top:1px solid rgba(255,255,255,.15);}
.main-content{flex:1;display:flex;flex-direction:column;min-width:0;}
.topbar{background:#fff;box-shadow:0 2px 10px rgba(0,0,0,.06);}
.topbar-title{background:#1a5c38;color:#fff;text-align:center;padding:10px;font-weight:700;font-size:1rem;letter-spacing:1px;}
.topbar-inner{padding:10px 25px;display:flex;align-items:center;justify-content:space-between;}
.detail-card{border:none;border-radius:16px;box-shadow:0 4px 20px rgba(0,0,0,.08);}
.badge-diterima{background:#e3f2fd;color:#1565c0;padding:6px 14px;border-radius:20px;font-size:.82rem;display:inline-block;font-weight:600;}
.badge-diproses{background:#fff3e0;color:#e65100;padding:6px 14px;border-radius:20px;font-size:.82rem;display:inline-block;font-weight:600;}
.badge-selesai{background:#e8f5e9;color:#2e7d32;padding:6px 14px;border-radius:20px;font-size:.82rem;display:inline-block;font-weight:600;}
.badge-diambil{background:#f3e5f5;color:#6a1b9a;padding:6px 14px;border-radius:20px;font-size:.82rem;display:inline-block;font-weight:600;}
</style>
</head>
<body>
<div class="d-flex">
  <div class="sidebar">
    <div class="brand">
      <div class="d-flex align-items-center gap-2">
        <div style="background:rgba(255,255,255,.2);border-radius:10px;width:38px;height:38px;display:flex;align-items:center;justify-content:center;"><i class="fas fa-tshirt text-white"></i></div>
        <div><h4 class="mb-0">LAUNDRY</h4><p class="mb-0">Pelanggan Portal</p></div>
      </div>
    </div>
    <nav>
      <span class="nav-section">MENU UTAMA</span>
      <a href="<?= site_url('user/dashboard') ?>" class="nav-link"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
      <span class="nav-section mt-2">LAYANAN SAYA</span>
      <a href="<?= site_url('user/riwayat') ?>" class="nav-link active"><i class="fas fa-history"></i> Riwayat Laundry</a>
      <a href="<?= site_url('user/profil') ?>" class="nav-link"><i class="fas fa-user-circle"></i> Profil Saya</a>
    </nav>
    <div class="user-bottom">
      <div class="d-flex align-items-center gap-2">
        <div style="background:rgba(255,255,255,.2);border-radius:8px;width:34px;height:34px;display:flex;align-items:center;justify-content:center;"><i class="fas fa-user text-white fa-sm"></i></div>
        <div class="flex-grow-1">
          <div style="color:#fff;font-size:.82rem;font-weight:600;"><?= $pelanggan['nama_pelanggan'] ?></div>
          <div style="color:rgba(255,255,255,.6);font-size:.72rem;">Pelanggan</div>
        </div>
        <a href="<?= site_url('user/logout') ?>" style="color:rgba(255,255,255,.6);" title="Logout"><i class="fas fa-sign-out-alt"></i></a>
      </div>
    </div>
  </div>
  <div class="main-content">
    <div class="topbar">
      <div class="topbar-title">DETAIL TRANSAKSI</div>
      <div class="topbar-inner">
        <div>
          <h6 class="mb-0 fw-bold" style="color:#2d3748;">Detail Transaksi</h6>
          <small class="text-muted">Invoice: <?= $transaksi['kode_transaksi'] ?></small>
        </div>
        <a href="<?= site_url('user/riwayat') ?>" class="btn btn-sm btn-outline-secondary rounded-pill"><i class="fas fa-arrow-left me-1"></i>Kembali</a>
      </div>
    </div>
    <div class="p-4">
      <div class="row g-4">
        <div class="col-md-8">
          <div class="card detail-card p-4">
            <div class="d-flex justify-content-between align-items-start mb-4">
              <div>
                <h5 class="fw-bold mb-1"><?= $transaksi['kode_transaksi'] ?></h5>
                <p class="text-muted mb-0"><?= date('d M Y', strtotime($transaksi['tanggal_masuk'])) ?></p>
              </div>
              <span class="badge-<?= strtolower($transaksi['status']) ?>"><?= $transaksi['status'] ?></span>
            </div>
            <div class="row g-3">
              <div class="col-6"><div class="p-3 rounded-3" style="background:#f8fafc;"><small class="text-muted d-block">Layanan</small><strong><?= $transaksi['nama_layanan'] ?></strong></div></div>
              <div class="col-6"><div class="p-3 rounded-3" style="background:#f8fafc;"><small class="text-muted d-block">Berat</small><strong><?= $transaksi['berat_kg'] ?> kg</strong></div></div>
              <div class="col-6"><div class="p-3 rounded-3" style="background:#f8fafc;"><small class="text-muted d-block">Tgl Masuk</small><strong><?= date('d M Y', strtotime($transaksi['tanggal_masuk'])) ?></strong></div></div>
              <div class="col-6"><div class="p-3 rounded-3" style="background:#f8fafc;"><small class="text-muted d-block">Tgl Selesai</small><strong><?= date('d M Y', strtotime($transaksi['tanggal_selesai'])) ?></strong></div></div>
              <?php if($transaksi['catatan']): ?>
              <div class="col-12"><div class="p-3 rounded-3" style="background:#fff3e0;"><small class="text-muted d-block">Catatan</small><span><?= $transaksi['catatan'] ?></span></div></div>
              <?php endif; ?>
            </div>
            <div class="mt-4 pt-3" style="border-top:2px dashed #e8edf2;">
              <div class="d-flex justify-content-between align-items-center">
                <span class="fw-bold" style="font-size:1rem;">Total Pembayaran</span>
                <span class="fw-bold" style="font-size:1.4rem;color:#1a5c38;">Rp <?= number_format($transaksi['total_harga'],0,',','.') ?></span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card detail-card p-4">
            <h6 class="fw-bold mb-3">Info Pelanggan</h6>
            <div class="mb-2"><small class="text-muted">Nama</small><div class="fw-600"><?= $pelanggan['nama_pelanggan'] ?></div></div>
            <div class="mb-2"><small class="text-muted">Telepon</small><div><?= $pelanggan['telepon'] ?></div></div>
            <div class="mb-2"><small class="text-muted">Alamat</small><div><?= $pelanggan['alamat'] ?? '-' ?></div></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body></html>
