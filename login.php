<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - UAS Laundry</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">

</head>
<body>

<div class="login-page d-flex align-items-center justify-content-center py-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-5 col-lg-4">

                <div class="login-card card p-4 p-md-5">

                    <div class="text-center mb-4">

                        <div class="login-brand-icon mb-3">
                            <i class="fas fa-tshirt fa-2x text-white"></i>
                        </div>

                        <h4 class="fw-700 mb-1" style="color:#1a237e;">
                            UAS Laundry
                        </h4>

                        <p class="text-muted mb-0" style="font-size:0.88rem;">
                            Sistem Manajemen Laundry
                        </p>

                    </div>

                    <?php if($this->session->flashdata('error')): ?>

                        <div class="alert alert-danger rounded-3 py-2 px-3">

                            <i class="fas fa-exclamation-circle me-2"></i>

                            <?= $this->session->flashdata('error'); ?>

                        </div>

                    <?php endif; ?>

                    <?php if($this->session->flashdata('success')): ?>

                        <div class="alert alert-success rounded-3 py-2 px-3">

                            <i class="fas fa-check-circle me-2"></i>

                            <?= $this->session->flashdata('success'); ?>

                        </div>

                    <?php endif; ?>


                    <form action="<?= site_url('login/proses') ?>" method="POST">

                        <div class="mb-3">

                            <label class="form-label fw-500">
                                Username
                            </label>

                            <div class="input-group">

                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-user text-muted"></i>
                                </span>

                                <input
                                    type="text"
                                    name="username"
                                    class="form-control border-start-0 ps-0"
                                    placeholder="Masukkan Username"
                                    required>

                            </div>

                        </div>


                        <div class="mb-4">

                            <label class="form-label fw-500">
                                Password
                            </label>

                            <div class="input-group">

                                <span class="input-group-text bg-light border-end-0">

                                    <i class="fas fa-lock text-muted"></i>

                                </span>

                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="form-control border-start-0 border-end-0 ps-0"
                                    placeholder="Masukkan Password"
                                    required>

                                <span
                                    class="input-group-text bg-light border-start-0"
                                    onclick="togglePass()"
                                    style="cursor:pointer;">

                                    <i class="fas fa-eye text-muted" id="eye-icon"></i>

                                </span>

                            </div>

                        </div>


                        <button
                            type="submit"
                            class="btn w-100 py-2 fw-bold"
                            style="background:linear-gradient(135deg,#1e88e5,#1565c0);color:#fff;border:none;border-radius:10px;">

                            <i class="fas fa-sign-in-alt me-2"></i>

                            Masuk

                        </button>

                    </form>


                    <hr class="my-4">


                    <div class="text-center">

                        <p class="text-muted mb-3">

                            Belum punya akun?

                        </p>

                        <a href="<?= site_url('register') ?>"
                           class="btn btn-outline-success w-100 rounded-3">

                            <i class="fas fa-user-plus me-2"></i>

                            Daftar Sekarang

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>

function togglePass(){

    var p=document.getElementById("password");

    var e=document.getElementById("eye-icon");

    if(p.type==="password"){

        p.type="text";

        e.classList.replace("fa-eye","fa-eye-slash");

    }else{

        p.type="password";

        e.classList.replace("fa-eye-slash","fa-eye");

    }

}

</script>

</body>
</html>