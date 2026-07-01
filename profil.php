<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profil Saya - UAS Laundry</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
*{font-family:'Poppins',sans-serif;}body{background:#f0f4f8;margin:0;}
.d-flex{display:flex;}
.sidebar{width:240px;min-width:240px;min-height:100vh;background:linear-gradient(180deg,#1a237e 0%,#1e88e5 100%);box-shadow:4px 0 15px rgba(0,0,0,.15);display:flex;flex-direction:column;}
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
.topbar-title{background:#1a237e;color:#fff;text-align:center;padding:10px;font-weight:700;font-size:1rem;letter-spacing:1px;}
.topbar-inner{padding:10px 25px;display:flex;align-items:center;justify-content:space-between;}
.profile-card{border:none;border-radius:16px;box-shadow:0 4px 20px rgba(0,0,0,.08);}
</style>
</head>
<body>
<div class="d-flex">
  <div class="sidebar">
    <div class="brand">
      <div class="d-flex align-items-center gap-2">
        <div style="background:rgba(255,255,255,.2);border-radius:10px;width:38px;height:38px;display:flex;align-items:center;justify-content:center;"><i class="fas fa-tshirt text-white"></i></div>
        <div><h4 class="mb-0">LAUNDRY APP</h4><p class="mb-0">Pelanggan Portal</p></div>
      </div>
    </div>
    <nav>
      <span class="nav-section">MENU UTAMA</span>
      <a href="<?= site_url('user/dashboard') ?>" class="nav-link"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
      <span class="nav-section mt-2">LAYANAN SAYA</span>
      <a href="<?= site_url('user/riwayat') ?>" class="nav-link"><i class="fas fa-history"></i> Riwayat Laundry</a>
      <a href="<?= site_url('user/profil') ?>" class="nav-link active"><i class="fas fa-user-circle"></i> Profil Saya</a>
    </nav>
    <div class="user-bottom">
      <div class="d-flex align-items-center gap-2 mb-2">
        <div style="background:rgba(255,255,255,.2);border-radius:8px;width:34px;height:34px;display:flex;align-items:center;justify-content:center;"><i class="fas fa-user text-white fa-sm"></i></div>
        <div class="flex-grow-1">
          <div style="color:#fff;font-size:.82rem;font-weight:600;"><?= htmlspecialchars($pelanggan['nama_pelanggan']) ?></div>
          <div style="color:rgba(255,255,255,.6);font-size:.72rem;">Pelanggan</div>
        </div>
      </div>
      <button onclick="document.getElementById('modalLogout').style.display='flex'" style="width:100%;background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.25);color:#fff;padding:8px 12px;border-radius:8px;font-size:.8rem;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:8px;transition:all .2s;" onmouseover="this.style.background='rgba(239,68,68,.7)'" onmouseout="this.style.background='rgba(255,255,255,.12)'">
        <i class="fas fa-sign-out-alt"></i> Keluar
      </button>
    </div>
  </div>

  <!-- MODAL LOGOUT -->
  <div id="modalLogout" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,.5);z-index:9999;align-items:center;justify-content:center;">
    <div style="background:#fff;border-radius:16px;padding:32px 28px;width:340px;text-align:center;box-shadow:0 20px 60px rgba(0,0,0,.2);">
      <div style="width:64px;height:64px;background:#fee2e2;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
        <i class="fas fa-sign-out-alt" style="color:#ef4444;font-size:1.6rem;"></i>
      </div>
      <h5 class="fw-bold mb-1" style="color:#1e293b;">Keluar Akun?</h5>
      <p style="color:#64748b;font-size:.87rem;margin-bottom:24px;">Apakah Anda yakin ingin keluar dari akun pelanggan ini?</p>
      <div class="d-flex gap-2 justify-content-center">
        <button onclick="document.getElementById('modalLogout').style.display='none'" style="padding:9px 24px;border-radius:8px;border:1px solid #e2e8f0;background:#fff;color:#64748b;font-size:.85rem;cursor:pointer;font-family:'Poppins',sans-serif;">Batal</button>
        <a href="<?= site_url('user/logout') ?>" style="padding:9px 24px;border-radius:8px;background:#ef4444;color:#fff;font-size:.85rem;text-decoration:none;font-family:'Poppins',sans-serif;display:inline-flex;align-items:center;gap:6px;"><i class="fas fa-sign-out-alt"></i> Ya, Keluar</a>
      </div>
    </div>
  </div>

  <div class="main-content">
    <div class="topbar">
      <div class="topbar-title">PROFIL SAYA</div>
      <div class="topbar-inner">
        <h6 class="mb-0 fw-bold" style="color:#2d3748;">Profil Saya</h6>
      </div>
    </div>
    <div class="p-4">
      <?php if($this->session->flashdata('success')): ?>
      <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
        <i class="fas fa-check-circle me-2"></i><?= $this->session->flashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
      <?php endif; ?>
      <?php if($this->session->flashdata('error')): ?>
      <div class="alert alert-danger alert-dismissible fade show rounded-3" role="alert">
        <i class="fas fa-exclamation-circle me-2"></i><?= $this->session->flashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
      <?php endif; ?>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card profile-card p-4 text-center">
            <div style="width:90px;height:90px;background:#e3f2fd;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
              <i class="fas fa-user" style="color:#1a237e;font-size:2.5rem;"></i>
            </div>
            <h5 class="fw-bold mb-1"><?= htmlspecialchars($pelanggan['nama_pelanggan']) ?></h5>
            <p class="text-muted mb-0" style="font-size:.85rem;"><?= htmlspecialchars($pelanggan['email'] ?? '-') ?></p>
            <span class="badge mt-2" style="background:#e3f2fd;color:#1a237e;">Pelanggan</span>
            <div class="mt-3 pt-3" style="border-top:1px solid #f0f4f8;text-align:left;">
              <p class="mb-1" style="font-size:.83rem;"><i class="fas fa-phone me-2 text-muted"></i><?= htmlspecialchars($pelanggan['telepon']) ?></p>
              <p class="mb-0" style="font-size:.83rem;"><i class="fas fa-map-marker-alt me-2 text-muted"></i><?= htmlspecialchars($pelanggan['alamat'] ?? '-') ?></p>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card profile-card p-4">
            <h6 class="fw-bold mb-4"><i class="fas fa-edit me-2 text-primary"></i>Edit Profil</h6>
            <form action="<?= site_url('user/update_profil') ?>" method="post">
              <div class="mb-3">
                <label class="form-label fw-500" style="font-size:.85rem;">Nama Lengkap <span class="text-danger">*</span></label>
                <input type="text" name="nama_pelanggan" class="form-control rounded-3" value="<?= htmlspecialchars($pelanggan['nama_pelanggan']) ?>" required>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="form-label fw-500" style="font-size:.85rem;">No. Telepon <span class="text-danger">*</span></label>
                  <input type="text" name="telepon" class="form-control rounded-3" value="<?= htmlspecialchars($pelanggan['telepon']) ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label fw-500" style="font-size:.85rem;">Email</label>
                  <input type="email" name="email" class="form-control rounded-3" value="<?= htmlspecialchars($pelanggan['email'] ?? '') ?>">
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label fw-500" style="font-size:.85rem;">Alamat</label>
                <textarea name="alamat" class="form-control rounded-3" rows="2"><?= htmlspecialchars($pelanggan['alamat'] ?? '') ?></textarea>
              </div>
              <div class="mb-3">
                <label class="form-label fw-500" style="font-size:.85rem;">Username</label>
                <input type="text" class="form-control rounded-3" value="<?= htmlspecialchars($pelanggan['username'] ?? '-') ?>" disabled style="background:#f8fafc;">
                <small class="text-muted">Username tidak dapat diubah</small>
              </div>
              <hr>
              <p class="fw-bold mb-2" style="font-size:.85rem;"><i class="fas fa-lock me-2 text-warning"></i>Ganti Password <span class="text-muted fw-normal">(kosongkan jika tidak ingin mengubah)</span></p>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="form-label" style="font-size:.85rem;">Password Baru</label>
                  <input type="password" name="password_baru" class="form-control rounded-3" placeholder="Min. 6 karakter">
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label" style="font-size:.85rem;">Konfirmasi Password Baru</label>
                  <input type="password" name="konfirmasi_password" class="form-control rounded-3" placeholder="Ulangi password baru">
                </div>
              </div>
              <button type="submit" class="btn rounded-pill px-4" style="background:#1a237e;color:#fff;"><i class="fas fa-save me-2"></i>Simpan Perubahan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body></html>
