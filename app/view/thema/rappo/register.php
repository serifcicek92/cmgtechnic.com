<div class="container-scroller mt50">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-5 mx-auto">
                    <div class="card">
                        <div class="card-body register-card-body">
                        <p class="login-box-msg">Yeni bir üyelik oluşturun</p>
                        <form action="" method="post" id="form2" data-dest="register">
                            <div class="input-group mb-3">
                            <input type="text" name="adsoyad" class="form-control" placeholder="İsim Soyisim">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-user"></span>
                                </div>
                            </div>
                            </div>
                            <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="E-mail">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            </div>
                            <div class="input-group mb-3">
                            <input type="password" name="sifre" class="form-control" placeholder="parolanız">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            </div>
                            <div class="input-group mb-3">
                            <input type="password" name="sifretekrar" class="form-control" placeholder="Parolanız Tekrar">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <!-- <p>Üye olarak tüm üyelik haklarından yararlanacaksınız. KKV kanuna göre kişisel verilerinizi saklamaktayız. KKV yi ve Tüm çerezleri kabul etmiş olursunuz. Doğacak tüm sorumluluklardan tarafımız münezzehtir.</p> -->
                                <label for="agreeTerms">
                                Şartları <a href="#">kabul</a> ediyorum
                                </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Kayıt Ol</button>
                            </div>
                            <!-- /.col -->
                            </div>
                            <div class="row">
                                
                                <div class="alert alert-success" role="alert" style="display: none;" id="formalertsuccess"></div>
                                <div class="alert alert-danger" role="alert" style="display: none;" id="formalertdanger"></div>
                            </div>
                        </form>

                        <!-- <div class="social-auth-links text-center">
                            <p>- OR -</p>
                            <a href="#" class="btn btn-block btn-primary">
                            <i class="fab fa-facebook mr-2"></i>
                            Sign up using Facebook
                            </a>
                            <a href="#" class="btn btn-block btn-danger">
                            <i class="fab fa-google-plus mr-2"></i>
                            Sign up using Google+
                            </a>
                        </div> -->

                        <a href="login" class="text-center">Zaten bir üyeliğe sahibim.</a>
                        </div>
                        <!-- /.form-box -->
                    </div><!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const sifre = document.querySelector("input[name='sifre']");
    const sifretekrar = document.querySelector("input[name='sifretekrar']");
    sifretekrar.addEventListener("keyup",function(event) {
        console.log(sifre.value);
        console.log(sifretekrar.value);
        if (sifre.value == sifretekrar.value) {
            console.log("oldu");
            document.querySelector("#formalertdanger").style.display = "none";
            document.querySelector("#formalertsuccess").style.display = "block";
            document.querySelector("#formalertsuccess").innerHTML="Şifreniz Eşleşti";
            setTimeout(function(){
                  document.querySelector("#formalertsuccess").style.display = "none";
              },9000);
        }else{
            document.querySelector("#formalertsuccess").style.display = "none";
            document.querySelector("#formalertdanger").style.display = "block";
            document.querySelector("#formalertdanger").innerHTML="Şifreniz Eşleşmiyor";
            setTimeout(function(){
                  document.querySelector("#formalertdanger").style.display = "none";
              },9000);
        }
    });

</script>