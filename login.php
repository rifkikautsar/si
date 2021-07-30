<title>Login</title>
<style>
.bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
}

@media (min-width: 768px) {
    .bd-placeholder-img-lg {
        font-size: 3.5rem;
    }
}
</style>

<body>
    <form method="post" action="konfirmlogin.php">
        <!-- A card with given width -->
        <div class="col d-flex justify-content-center">
            <div class="card text-dark mt-5 mb-5" style="max-width: 330px;  ">
                <div class="card-header" style="text-align: center;">Login
                </div>
                <div class="cards-body">
                    <!--Field Username-->
                    <div class="form-group">
                        <label for="uname">Username:</label>
                        <input type="text" class="form-control" id="uname" placeholder="Masukkan username" name="uname"
                            required>
                    </div>
                </div>
                <!--Field Password-->
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Masukkan password" name="pswd"
                        required>
                </div>
                <div class="form-group form-check" style="text-align: center;">
                    <label class="form-check-label">
                        <button class="w-100 btn btn-lg btn-outline-dark" type="submit" name="TblLogin">Masuk</button>
                </div>
            </div>
        </div>
    </form>