<title>Login</title>
<style>
.bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
}

img {
    margin-bottom: 0.5rem;
}

@media (min-width: 768px) {
    .bd-placeholder-img-lg {
        font-size: 3.5rem;
    }
}
</style>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-12 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="assets/images/logo.jpg" alt="" style="max-width: 76px;">
                                        <h4 class="text-gray-900">Lab IPA SMPN 1 Sukaresik</h4>
                                        <h5 class="h5 text-gray-900 mb-4 pt-1">Silakan Login</h5>
                                    </div>
                                    <form class="user" method="post" action="konfirmlogin.php">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="uname"
                                                aria-describedby="emailHelp" placeholder="Masukkan username..."
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="pswd"
                                                placeholder="Password" required>
                                        </div>
                                        <button type="submit" name="TblLogin"
                                            class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>