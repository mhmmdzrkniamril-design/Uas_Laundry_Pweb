<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Daftar Pelanggan - UAS Laundry</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">

</head>
<body>

<div class="login-page d-flex align-items-center justify-content-center py-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-6 col-lg-5">

                <div class="login-card card p-4 p-md-5">

                    <div class="text-center mb-4">

                        <div class="login-brand-icon mb-3">
                            <i class="fas fa-user-plus fa-2x text-white"></i>
                        </div>

                        <h4 class="fw-bold mb-1" style="color:#1a237e;">
                            Daftar Pelanggan
                        </h4>

                        <p class="text-muted mb-0">
                            Buat akun untuk menggunakan layanan laundry
                        </p>

                    </div>

                    <?php if($this->session->flashdata('error')): ?>

                    <div class="alert alert-danger">

                        <i class="fas fa-times-circle me-2"></i>

                        <?= $this->session->flashdata('error'); ?>

                    </div>

                    <?php endif; ?>

                    <form action="<?= site_url('register/proses') ?>" method="POST">

                        <div class="mb-3">

                            <label class="form-label">Nama Lengkap</label>

                            <input
                                type="text"
                                name="nama_pelanggan"
                                class="form-control"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">No. Telepon</label>

                            <input
                                type="text"
                                name="telepon"
                                class="form-control"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Alamat</label>

                            <textarea
                                name="alamat"
                                class="form-control"
                                rows="3"
                                required></textarea>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Email</label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Username</label>

                            <input
                                type="text"
                                name="username"
                                class="form-control"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Password</label>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-control"
                                required>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                Konfirmasi Password
                            </label>

                            <input
                                type="password"
                                id="konfirmasi_password"
                                name="konfirmasi_password"
                                class="form-control"
                                required>

                        </div>

                        <button
                            class="btn w-100 py-2 fw-bold"
                            style="background:linear-gradient(135deg,#1e88e5,#1565c0);color:white;border:none;">

                            <i class="fas fa-user-plus me-2"></i>

                            Daftar

                        </button>

                    </form>

                    <hr class="my-4">

                    <div class="text-center">

                        Sudah punya akun?

                        <br><br>

                        <a href="<?= site_url('login'); ?>"
                           class="btn btn-outline-primary w-100">

                            <i class="fas fa-sign-in-alt me-2"></i>

                            Login Sekarang

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>