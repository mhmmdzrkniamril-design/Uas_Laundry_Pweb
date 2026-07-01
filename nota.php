<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Nota <?= $transaksi['kode_transaksi'] ?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
  body { font-family: 'Poppins', sans-serif; background: #f0f4f8; }
  .nota-wrap { max-width: 420px; margin: 30px auto; background: #fff; border-radius: 16px; overflow: hidden; box-shadow: 0 8px 30px rgba(0,0,0,0.12); }
  .nota-header { background: linear-gradient(135deg, #1a237e, #1e88e5); color: white; padding: 24px; text-align: center; }
  .nota-header h4 { font-weight: 700; margin: 0; }
  .nota-body { padding: 20px 24px; }
  .nota-row { display: flex; justify-content: space-between; padding: 6px 0; border-bottom: 1px dashed #e8edf2; font-size: 0.88rem; }
  .nota-row:last-child { border-bottom: none; }
  .nota-total { background: linear-gradient(135deg, #1a237e, #1e88e5); color: white; padding: 14px 24px; display: flex; justify-content: space-between; font-weight: 700; font-size: 1.05rem; }
  .nota-footer { text-align: center; padding: 16px; background: #f8fafc; font-size: 0.78rem; color: #64748b; }
  .status-badge { padding: 3px 12px; border-radius: 20px; font-size: 0.78rem; font-weight: 600; }
  @media print { .no-print { display: none !important; } body { background: white; } .nota-wrap { box-shadow: none; margin: 0; border-radius: 0; } }
</style>
</head>
<body>
<div class="no-print text-center py-3">
  <button onclick="window.print()" class="btn btn-primary rounded-pill me-2">
    <i class="fas fa-print me-1"></i>Cetak Nota
  </button>
  <a href="<?= site_url('transaksi') ?>" class="btn btn-outline-secondary rounded-pill">
    <i class="fas fa-arrow-left me-1"></i>Kembali
  </a>
</div>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<div class="nota-wrap nota-print">
  <div class="nota-header">
    <div style="font-size:2rem;margin-bottom:6px;">🧺</div>
    <h4>UAS LAUNDRY</h4>
    <div style="font-size:0.82rem;opacity:0.85;">Management System</div>
    <div style="margin-top:8px;font-size:0.78rem;opacity:0.7;">Mataram, Nusa Tenggara Barat</div>
  </div>

  <div class="nota-body">
    <div class="text-center mb-3">
      <span class="fw-bold" style="font-size:0.95rem;color:#1a237e;">NOTA TRANSAKSI</span>
      <div style="font-size:1.1rem;font-weight:700;color:#1e88e5;"><?= $transaksi['kode_transaksi'] ?></div>
    </div>

    <div class="nota-row">
      <span class="text-muted">Pelanggan</span>
      <span class="fw-500"><?= $transaksi['nama_pelanggan'] ?></span>
    </div>
    <div class="nota-row">
      <span class="text-muted">Telepon</span>
      <span><?= $transaksi['telepon'] ?></span>
    </div>
    <div class="nota-row">
      <span class="text-muted">Layanan</span>
      <span><?= $transaksi['nama_layanan'] ?></span>
    </div>
    <div class="nota-row">
      <span class="text-muted">Berat</span>
      <span><?= $transaksi['berat_kg'] ?> kg</span>
    </div>
    <div class="nota-row">
      <span class="text-muted">Harga/kg</span>
      <span>Rp <?= number_format($transaksi['harga_per_kg'],0,',','.') ?></span>
    </div>
    <div class="nota-row">
      <span class="text-muted">Tgl Masuk</span>
      <span><?= date('d M Y', strtotime($transaksi['tanggal_masuk'])) ?></span>
    </div>
    <div class="nota-row">
      <span class="text-muted">Estimasi Selesai</span>
      <span><?= date('d M Y', strtotime($transaksi['tanggal_selesai'])) ?></span>
    </div>
    <div class="nota-row">
      <span class="text-muted">Status</span>
      <span class="fw-600" style="color:#1e88e5;"><?= $transaksi['status'] ?></span>
    </div>
    <?php if ($transaksi['catatan']): ?>
    <div class="nota-row">
      <span class="text-muted">Catatan</span>
      <span><?= $transaksi['catatan'] ?></span>
    </div>
    <?php endif; ?>
  </div>

  <div class="nota-total">
    <span>TOTAL BAYAR</span>
    <span>Rp <?= number_format($transaksi['total_harga'],0,',','.') ?></span>
  </div>

  <div class="nota-footer">
    <div>Terima kasih telah menggunakan layanan kami!</div>
    <div>Simpan nota ini sebagai bukti pengambilan.</div>
    <div class="mt-1" style="font-size:0.7rem;">Dicetak: <?= date('d/m/Y H:i') ?></div>
  </div>
</div>
</body>
</html>
