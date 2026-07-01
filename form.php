<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card table-card">
      <div class="card-header">
        <h6 class="mb-0 fw-bold">
          <i class="fas fa-receipt me-2" style="color:#1e88e5;"></i>
          <?= isset($transaksi) ? 'Edit' : 'Tambah' ?> Transaksi
        </h6>
      </div>
      <div class="card-body">
        <form method="POST" action="<?= site_url(isset($transaksi) ? 'transaksi/update/'.$transaksi['id_transaksi'] : 'transaksi/simpan') ?>">

          <?php if (!isset($transaksi)): ?>
          <div class="mb-3">
            <label class="form-label fw-500">Kode Transaksi</label>
            <input type="text" class="form-control bg-light" value="<?= $kode ?>" readonly>
          </div>
          <?php endif; ?>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label fw-500">Pelanggan <span class="text-danger">*</span></label>
              <select name="id_pelanggan" class="form-select" required>
                <option value="">-- Pilih Pelanggan --</option>
                <?php foreach ($pelanggan as $p): ?>
                <option value="<?= $p['id_pelanggan'] ?>"
                  <?= (isset($transaksi) && $transaksi['id_pelanggan']==$p['id_pelanggan']) ? 'selected' : '' ?>>
                  <?= $p['nama_pelanggan'] ?> (<?= $p['telepon'] ?>)
                </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label fw-500">Layanan <span class="text-danger">*</span></label>
              <select name="id_layanan" id="id_layanan" class="form-select" required onchange="getHarga(this.value)">
                <option value="">-- Pilih Layanan --</option>
                <?php foreach ($layanan as $l): ?>
                <option value="<?= $l['id_layanan'] ?>"
                  data-harga="<?= $l['harga_per_kg'] ?>"
                  <?= (isset($transaksi) && $transaksi['id_layanan']==$l['id_layanan']) ? 'selected' : '' ?>>
                  <?= $l['nama_layanan'] ?> - Rp <?= number_format($l['harga_per_kg'],0,',','.') ?>/kg
                </option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 mb-3">
              <label class="form-label fw-500">Berat (KG) <span class="text-danger">*</span></label>
              <input type="number" name="berat_kg" id="berat_kg" class="form-control"
                value="<?= isset($transaksi) ? $transaksi['berat_kg'] : '' ?>"
                placeholder="0.5" min="0.1" step="0.1" required oninput="hitungTotal()">
            </div>
            <div class="col-md-4 mb-3">
              <label class="form-label fw-500">Estimasi Selesai <span class="text-danger">*</span></label>
              <select name="estimasi_hari" id="estimasi_hari" class="form-select" required onchange="hitungTotal()">
                <option value="4" data-multiplier="1.0" <?= (isset($transaksi) && $transaksi['estimasi_hari']==4) ? 'selected' : '' ?>>4 Hari</option>
                <option value="3" data-multiplier="1.2" <?= (!isset($transaksi) || $transaksi['estimasi_hari']==3) ? 'selected' : '' ?>>3 Hari</option>
                <option value="2" data-multiplier="1.5" <?= (isset($transaksi) && $transaksi['estimasi_hari']==2) ? 'selected' : '' ?>>2 Hari</option>
                <option value="1" data-multiplier="2.0" <?= (isset($transaksi) && $transaksi['estimasi_hari']==1) ? 'selected' : '' ?>>1 Hari / Express</option>
              </select>
            </div>
            <div class="col-md-4 mb-3">
              <label class="form-label fw-500">Harga / KG</label>
              <div class="input-group">
                <span class="input-group-text">Rp</span>
                <input type="text" id="harga_per_kg" class="form-control bg-light" readonly
                  value="<?= isset($transaksi) ? number_format($transaksi['harga_per_kg'],0,',','.') : '0' ?>">
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label fw-500">Total Harga</label>
            <div class="input-group">
              <span class="input-group-text">Rp</span>
              <input type="text" id="total_display" class="form-control bg-light fw-bold" readonly
                value="<?= isset($transaksi) ? number_format($transaksi['total_harga'],0,',','.') : '0' ?>"
                style="color:#1e88e5; font-size:1.1rem;">
            </div>
          </div>

          <?php if (isset($transaksi)): ?>
          <div class="mb-3">
            <label class="form-label fw-500">Status</label>
            <select name="status" class="form-select">
              <?php foreach (['Diterima','Diproses','Selesai','Diambil'] as $s): ?>
              <option value="<?= $s ?>" <?= $transaksi['status']==$s ? 'selected' : '' ?>><?= $s ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <?php endif; ?>

          <div class="mb-4">
            <label class="form-label fw-500">Catatan</label>
            <textarea name="catatan" class="form-control" rows="2"
              placeholder="Catatan tambahan (opsional)"><?= isset($transaksi) ? $transaksi['catatan'] : '' ?></textarea>
          </div>

          <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary rounded-pill px-4">
              <i class="fas fa-save me-1"></i>Simpan
            </button>
            <a href="<?= site_url('transaksi') ?>" class="btn btn-outline-secondary rounded-pill px-4">
              <i class="fas fa-arrow-left me-1"></i>Kembali
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
var hargaRaw = 0;

function getHarga(id_layanan) {
    if (!id_layanan) return;
    var sel = document.getElementById('id_layanan');
    var opt = sel.options[sel.selectedIndex];
    hargaRaw = parseFloat(opt.dataset.harga) || 0;
    document.getElementById('harga_per_kg').value = formatRupiah(hargaRaw);
    hitungTotal();
}

function hitungTotal() {
    var berat = parseFloat(document.getElementById('berat_kg').value) || 0;
    var selEst = document.getElementById('estimasi_hari');
    var optEst = selEst.options[selEst.selectedIndex];
    var multiplier = parseFloat(optEst.dataset.multiplier) || 1.0;
    var hargaEst = hargaRaw * multiplier;
    var total = berat * hargaEst;
    document.getElementById('total_display').value = formatRupiah(total);
}

function formatRupiah(num) {
    return num.toLocaleString('id-ID');
}

// Init on edit
<?php if (isset($transaksi)): ?>
hargaRaw = <?= $transaksi['harga_per_kg'] ?>;
hitungTotal();
<?php endif; ?>
</script>