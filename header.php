<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $title ?? 'Laundry' ?> - UAS Laundry</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
<style>
:root{--primary:#1e88e5;--primary-dark:#1565c0;--light-bg:#f0f4f8;--card-shadow:0 4px 20px rgba(0,0,0,.08);}
*{font-family:'Poppins',sans-serif;}
body{background:var(--light-bg);}
.sidebar{min-height:100vh;background:linear-gradient(180deg,#1a237e 0%,#1e88e5 100%);box-shadow:4px 0 15px rgba(0,0,0,.15);}
.sidebar .brand{padding:20px 15px;border-bottom:1px solid rgba(255,255,255,.15);}
.sidebar .brand h4{color:#fff;font-weight:700;margin:0;font-size:1.1rem;}
.sidebar .brand p{color:rgba(255,255,255,.7);font-size:.75rem;margin:0;}
.sidebar .nav-link{color:rgba(255,255,255,.8);padding:12px 20px;border-radius:8px;margin:2px 10px;transition:all .2s;display:flex;align-items:center;gap:10px;}
.sidebar .nav-link:hover,.sidebar .nav-link.active{background:rgba(255,255,255,.18);color:#fff;}
.sidebar .nav-section{color:rgba(255,255,255,.45);font-size:.7rem;text-transform:uppercase;letter-spacing:1.5px;padding:10px 20px 4px;display:block;}
.topbar{background:#fff;padding:0;box-shadow:0 2px 10px rgba(0,0,0,.06);}
.topbar-title-bar{background:#1a237e;color:#fff;text-align:center;padding:10px;font-weight:700;font-size:1rem;letter-spacing:1px;}
.topbar-inner{padding:10px 25px;display:flex;align-items:center;justify-content:space-between;}
.stat-card{border:none;border-radius:16px;box-shadow:var(--card-shadow);overflow:hidden;transition:transform .2s;}
.stat-card:hover{transform:translateY(-3px);}
.stat-card .icon-box{width:56px;height:56px;border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;}
.stat-card .stat-value{font-size:1.8rem;font-weight:700;line-height:1;}
.stat-card .stat-label{font-size:.8rem;color:#8898aa;}
.table-card{border:none;border-radius:16px;box-shadow:var(--card-shadow);}
.table-card .card-header{background:#fff;border-bottom:1px solid #e8edf2;padding:16px 20px;border-radius:16px 16px 0 0;}
.table thead th{background:#f8fafc;border-bottom:2px solid #e8edf2;color:#64748b;font-size:.78rem;text-transform:uppercase;letter-spacing:1px;font-weight:600;}
.badge-diterima{background:#e3f2fd;color:#1565c0;padding:5px 10px;border-radius:20px;font-size:.78rem;}
.badge-diproses{background:#fff3e0;color:#e65100;padding:5px 10px;border-radius:20px;font-size:.78rem;}
.badge-selesai{background:#e8f5e9;color:#2e7d32;padding:5px 10px;border-radius:20px;font-size:.78rem;}
.badge-diambil{background:#f3e5f5;color:#6a1b9a;padding:5px 10px;border-radius:20px;font-size:.78rem;}
.login-page{min-height:100vh;background:linear-gradient(135deg,#1a237e 0%,#1e88e5 50%,#26c6da 100%);}
.login-card{border:none;border-radius:20px;box-shadow:0 20px 60px rgba(0,0,0,.2);}
.login-brand-icon{width:72px;height:72px;background:linear-gradient(135deg,#1e88e5,#26c6da);border-radius:20px;display:flex;align-items:center;justify-content:center;margin:0 auto;}
@media print{body *{visibility:hidden;}.nota-print,.nota-print *{visibility:visible;}.nota-print{position:absolute;left:0;top:0;width:100%;}.no-print{display:none !important;}}
</style>
</head>
<body>
<div class="d-flex">
  <!-- SIDEBAR ADMIN -->
  <div class="sidebar d-flex flex-column" style="width:240px;min-width:240px;">
    <div class="brand">
      <div class="d-flex align-items-center gap-2">
        <div style="background:rgba(255,255,255,.2);border-radius:10px;width:38px;height:38px;display:flex;align-items:center;justify-content:center;">
          <i class="fas fa-tshirt text-white"></i>
        </div>
        <div>
          <h4 class="mb-0">LAUNDRY</h4>
          <p class="mb-0">Management System</p>
        </div>
      </div>
    </div>
    <nav class="flex-grow-1 mt-2 pb-3">
      <span class="nav-section">MENU UTAMA</span>
      <a href="<?= site_url('dashboard') ?>" class="nav-link <?= (uri_string()=='dashboard')?'active':'' ?>">
        <i class="fas fa-tachometer-alt"></i> Dashboard
      </a>
      <span class="nav-section mt-2">DATA MASTER</span>
      <a href="<?= site_url('pelanggan') ?>" class="nav-link <?= (strpos(uri_string(),'pelanggan')!==false)?'active':'' ?>">
        <i class="fas fa-users"></i> Pelanggan
      </a>
      <a href="<?= site_url('layanan') ?>" class="nav-link <?= (strpos(uri_string(),'layanan')!==false)?'active':'' ?>">
        <i class="fas fa-concierge-bell"></i> Layanan
      </a>
      <span class="nav-section mt-2">OPERASIONAL</span>
      <a href="<?= site_url('transaksi') ?>" class="nav-link <?= (strpos(uri_string(),'transaksi')!==false)?'active':'' ?>">
        <i class="fas fa-receipt"></i> Transaksi
      </a>
      <a href="<?= site_url('laporan') ?>" class="nav-link <?= (strpos(uri_string(),'laporan')!==false)?'active':'' ?>">
        <i class="fas fa-chart-bar"></i> Laporan
      </a>
      <span class="nav-section mt-2">SISTEM</span>
      <a href="<?= site_url('logout') ?>" class="nav-link">
        <i class="fas fa-sign-out-alt"></i> Logout
      </a>
    </nav>
    <div style="padding:15px;border-top:1px solid rgba(255,255,255,.15);">
      <div class="d-flex align-items-center gap-2">
        <div style="background:rgba(255,255,255,.2);border-radius:8px;width:34px;height:34px;display:flex;align-items:center;justify-content:center;">
          <i class="fas fa-user text-white fa-sm"></i>
        </div>
        <div class="flex-grow-1">
          <div style="color:#fff;font-size:.82rem;font-weight:600;"><?= $this->session->userdata('nama') ?></div>
          <div style="color:rgba(255,255,255,.6);font-size:.72rem;"><?= ucfirst($this->session->userdata('role')) ?></div>
        </div>
        <a href="<?= site_url('logout') ?>" class="ms-auto" style="color:rgba(255,255,255,.6);" title="Logout">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </div>
    </div>
  </div>

  <!-- MAIN CONTENT -->
  <div class="flex-grow-1 d-flex flex-column" style="min-width:0;">
    <div class="topbar">
      <div class="topbar-title-bar">DASHBOARD ADMIN</div>
      <div class="topbar-inner">
        <div>
          <h6 class="mb-0 fw-bold" style="color:#2d3748;"><?= $title ?? '' ?></h6>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0" style="font-size:.78rem;">
              <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>" class="text-decoration-none">Home</a></li>
              <li class="breadcrumb-item active"><?= $title ?? '' ?></li>
            </ol>
          </nav>
        </div>
        <div class="d-flex align-items-center gap-3">
          <div class="position-relative">
            <i class="fas fa-bell text-muted"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size:.6rem;">3</span>
          </div>
          <div class="d-flex align-items-center gap-2">
            <div style="width:34px;height:34px;background:#e3f2fd;border-radius:50%;display:flex;align-items:center;justify-content:center;">
              <i class="fas fa-user" style="color:#1e88e5;font-size:.85rem;"></i>
            </div>
            <div>
              <div style="font-size:.82rem;font-weight:600;">Admin Laundry</div>
              <div style="font-size:.72rem;color:#64748b;">Administrator</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="p-4 flex-grow-1">

<?php if ($this->session->flashdata('success')): ?>
<div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
  <i class="fas fa-check-circle me-2"></i><?= $this->session->flashdata('success') ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>
<?php if ($this->session->flashdata('error')): ?>
<div class="alert alert-danger alert-dismissible fade show rounded-3" role="alert">
  <i class="fas fa-exclamation-circle me-2"></i><?= $this->session->flashdata('error') ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>
